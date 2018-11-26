<?php

namespace App\Http\Controllers\Reseller;

use Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:reseller');
    }

    /**
     * List of the order and products of reseller.
     *
     * @return Response::view
     */
    public function index()
    {
        $reseller = Auth::user();
        $products = $reseller->product()->get();
        $orders = $reseller->order()->with('user')->get();

        return view('reseller.dashboard', compact('products', 'orders'));
    }

    /**
     * Order details of the reseller.
     *
     * @return Response::view
     */
    public function orderDetails($orderId)
    {
        $reseller = Auth::user();
        $order = $reseller->order()->where('id', $orderId)->with('orderItem')->first();

        return view('reseller.order', compact('order'));
    }
}
