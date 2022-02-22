<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    /********************************************************
     *  cart page show
     ********************************************************/
    public function MyCart()
    {
        return view('frontend.wishlist.view_mycart');
    }
    /*********************************************************
     *  get data from database
     *********************************************************/
    public function getCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response() -> json([
            'carts'     => $carts,
            'cartQty'     => $cartQty,
            'cartTotal'     => round($cartTotal),
        ]);
    }
    /********************************************************
     *  remove cart prodcut
     ********************************************************/
    public function removeCartProduct($rowId)
    {
        Cart::remove($rowId);
        return response() -> json([
            'success'   => 'Successfully Remove Cart'
        ]);
    }
    /********************************************************
     *  increment cart prodcut
     ********************************************************/
    public function cartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row -> qty + 1);
        return response() -> json([
            'success'   => 'Increment Cart'
        ]);
    }
    /********************************************************
     *  increment cart prodcut
     ********************************************************/
    public function cartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row -> qty - 1);
        return response() -> json([
            'success'   => 'Successfully Decrement Cart'
        ]);
    }
}
