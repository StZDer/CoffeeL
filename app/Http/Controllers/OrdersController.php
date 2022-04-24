<?php

namespace App\Http\Controllers;

use App\Models\cart_storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $carts = cart_storage::query()->orderBy('id', 'desc')->get();
        $carts->transform(
            function ($cart) {
                $cart->cart_data = unserialize($cart->cart_data);
                return $cart;
            }
        );
        return view('orders.index', [
            'carts' => $carts
        ]);
    }
    public function work()
    {
        $carts = cart_storage::query()->where('status', '1')->orderBy('id', 'desc')->get();
        $carts->transform(
            function ($cart) {
                $cart->cart_data = unserialize($cart->cart_data);
                return $cart;
            }
        );
        return view('orders.index', [
            'carts' => $carts
        ]);
    }
    public function done()
    {
        $carts = cart_storage::query()->where('status', '2')->orderBy('id', 'desc')->get();
        $carts->transform(
            function ($cart) {
                $cart->cart_data = unserialize($cart->cart_data);
                return $cart;
            }
        );
        return view('orders.index', [
            'carts' => $carts
        ]);
    }
    public function addDone($id) // В работе
    {
        DB::table('cart_storage')
            ->where('id', $id)
            ->update(['status' => 2]);

        return back()->with('success', 'Заказ перенесен в "Выполнен"');
    }
    public function addWork($id) // Не выполнено
    {
        DB::table('cart_storage')
            ->where('id', $id)
            ->update(['status' => 1]);

        return back()->with('success', 'Заказ перенесен в "В работе"');
    }
    public function more($id)
    {
        $carts = cart_storage::query()->where('id', $id)->get();
        $carts->transform(
            function ($cart) {
                $cart->cart_data = unserialize($cart->cart_data);
                return $cart;
            }
        );
        return view('orders.more', [
            'carts' => $carts
        ]);
    }
}
