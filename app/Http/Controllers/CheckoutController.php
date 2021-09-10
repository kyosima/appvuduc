<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //
    public function index(){
        $carts = Cart::instance('shopping')->content();
        $cart_subtotal = Cart::instance('shopping')->subtotal();
        $cart_total = Cart::instance('shopping')->total();
        return view('public.cart_checkout.checkout', ['carts' => $carts, 'cart_subtotal' => $cart_subtotal, 'cart_total'=>$cart_total]);
    }
}
