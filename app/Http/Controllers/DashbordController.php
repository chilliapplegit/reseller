<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List the orders of customer.
     *
     * @return Response::view
     */
    public function index()
    {   
        if (Session::has('cart')) {
            return redirect()->route('checkout');
        }

        $user = Auth::user();
        $orders = $user->order()->with('orderItem')->get();
     
        return view('dashboard', compact('orders', 'user'));
    }

    /**
     * Show the order deatils of the order.
     *
     * @return Response::view
     */
    public function orderDetails($orderId)
    {   
       $user = Auth::user(); 
       $order = $user->order()->with('orderItem')->with('reseller')->first();

       return view('order', compact('order'));
    }
}
