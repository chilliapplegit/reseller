<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Order placed of login customer.
     *
     * @return Redirect::route
     */
    public function index()
    {
        if (empty(Auth::user())) {
            return redirect()->route('login')->with('error', 'Please login or register before checkout');
        } else {
            if (Session::has('cart')) {
                $cartProducts = Session::get('cart');

                $customerId = Auth::user()->id;
                foreach($cartProducts as $resellerId => $products) {
                    $order = Order::create([
                        'customer_id' => $customerId,
                        'reseller_id'=> $resellerId
                    ]);

                    $orderId = $order->id;

                    if (! empty($orderId)) {
                        foreach($products as $product) {
                            $orderDetail = new OrderItem;
                            $orderDetail->order_id = $orderId;
                            $orderDetail->name = $product['name'];
                            $orderDetail->sku = $product['sku'];
                            $orderDetail->price = $product['price'];                         
                            $orderDetail->qty = $product['quantity'];
                            $orderDetail->save();
                        }
                    }
                }

                Session::forget('cart');
                Session::save();

                return redirect()->route('home')->with('success', 'Order has been placed');
            } else {
                return redirect()->route('home')->with('error', 'Please add to cart the product');
            }
        }
    }
}
