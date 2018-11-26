<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * List all of the Products which is added in cart.
     *
     * @return Response::view
     */
    public function index()
    {
        if (Session::has('cart')) {
            $cartProducts = Session::get('cart');
        } else {
            $cartProducts = [];
        }

        return view('shoppingCart', compact('cartProducts'));
    }
}
