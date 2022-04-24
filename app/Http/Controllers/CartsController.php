<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class CartsController extends Controller
{
    public function index()
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $product = \Cart::getContent();
        $sum = \Cart::getTotal('price');
        return view('cart.index', [
            'product' => $product,
            'sum' => $sum
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'img' => isset($product->images[0]->img) ? $product->images[0]->img : 'no_image.jpg',
                'description' => $product->description
            ]
        ]);

        return response()->json(\Cart::getContent());
    }
    public function deleteOneToCart(Request $request)
    {

        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $cartCollection = \Cart::session($cart_id)->get($request->id);
        if ($cartCollection->quantity == 1) {
            \Cart::remove($request->id);
        } else
            \Cart::update($request->id, [
                'quantity' => -1,
            ]);


        return redirect()->route('cart')->with('success', 'Товар убран!');
    }
    public function addOneToCart(Request $request)
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        \Cart::update($request->id, [
            'quantity' => +1,
        ]);

        return redirect()->route('cart')->with('success', 'Товар добавлен!');
    }
    public function deleteToCart(Request $request)
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        \Cart::remove($request->id);

        return redirect()->route('cart')->with('success', 'Товар удален!');
    }
    public function clearCart()
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id)->clear();

        return redirect()->route('cart')->with('success', 'Корзина очищена!');
    }
}
