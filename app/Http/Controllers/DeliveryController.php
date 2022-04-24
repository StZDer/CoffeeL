<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Http\Requests\PickupRequest;
use App\Mail\OrderShipped;
use App\Models\cart_storage;
use App\Models\cart_storage_pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{
    public function cartDelivery()
    {
        $user = auth()->user();
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $products = \Cart::getContent();
        $sum = \Cart::getTotal('price');
        return view(
            'cart.cart-delivery',
            [
                'products' => $products,
                'user' => $user,
                'sum' => $sum
            ]
        );
    }
    public function addDelivery(DeliveryRequest $red)
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $carts = \Cart::getContent();
        $sum = \Cart::getTotal('price');
        $user = auth()->user()->id;
        $cart = new cart_storage();
        $cart->user_id = $user;
        $cart->city = $red->input('city');
        $cart->street = $red->input('street');
        $cart->house = $red->input('house');
        $cart->phone = $red->input('phone');
        $cart->pay = $red->input('pay');
        $cart->frame = $red->input('frame');
        $cart->apartment = $red->input('apartment');
        $cart->entrance = $red->input('entrance');
        $cart->floor = $red->input('floor');
        $cart->intercom = $red->input('intercom');
        $cart->comment = $red->input('comment');

        $pickup = '1';
        $cart->cart_data = $cart->setCartDataAttribute($carts);
        $cart->total_sum = $sum;
        if ($cart->save()) {
            Mail::to('xxxisasha1999xxx@gmail.com')->send(new OrderShipped([
                'carts' => $carts, // корзина
                'cart' => $cart, // о польователи
                'sum' => $sum,
                'pickup' => $pickup
            ]));
            \Cart::session($cart_id)->clear();
            return redirect()->route('home')->with('success', 'Ваш заказ скоро будет у вас :)');
        } else {
            return redirect()->route('home')->with('delete', 'Возникла ошибка, обратитесь к администратору');
        }
    }

    public function addPickups(PickupRequest $red)
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $carts = \Cart::getContent();
        $sum = \Cart::getTotal('price');
        $user = auth()->user()->id;
        $cart = new cart_storage_pickup();
        $cart->user_id = $user;
        $cart->phone = $red->input('phone');
        $cart->comment = $red->input('comment');

        $pickup = '2';
        $cart->cart_data = $cart->setCartDataAttribute($carts);
        $cart->total_sum = $sum;
        if ($cart->save()) {
            Mail::to('xxxisasha1999xxx@gmail.com')->send(new OrderShipped([
                'carts' => $carts, // корзина
                'cart' => $cart, // о польователи
                'sum' => $sum,
                'pickup' => $pickup
            ]));
            \Cart::session($cart_id)->clear();
            return redirect()->route('home')->with('success', 'Ваш заказ скоро будет у вас :)');
        } else {
            return redirect()->route('home')->with('delete', 'Возникла ошибка, обратитесь к администратору');
        }
    }
}
