<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderItem;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the orders list.
     *
     * @return Response::view
     */
    public function show()
    {
        $orders = OrderItem::all();

        return view('admin.order', compact('orders'));
    }
}
