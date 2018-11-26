<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Reseller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * List all of the Resellers.
     *
     * @return Response::view
     */
    public function index()
    {
        $resellers = Reseller::all();

        return view('home', compact('resellers'));
    }

    /**
     * Display the reseller product details.
     *
     * @param Reseller Code $resellerCode
     *
     * @return Response::view
     */
    public function resellerProducts($resellerCode)
    {
        $resellerProducts = Reseller::where('code', $resellerCode)->with('product')->first();

        return view('product', compact('resellerProducts'));
    }

    /**
     * Add to cart the product.
     *
     * @param Reseller Id $resellerId
     * @param ProductId Id $productId
     *
     * @return Redirect::route
     */
    public function addToCartProduct(Request $request, $resellerId, $productId) 
    {
        $product = Product::find($productId);

        if (Session::has('cart')) {
            $cart = Session::get('cart');
            if (array_key_exists($resellerId, $cart)) {
                if (array_key_exists($productId, $cart[$resellerId])) {
                    $cart[$resellerId][$productId]['quantity'] = $cart[$resellerId][$productId]['quantity'] + 1;
                    Session::put('cart', $cart);
                } else {
                    $productInfo = [
                        'id' =>  $product->id,
                        'name' =>  $product->name,
                        'sku' =>  $product->sku,
                        'price' =>  $product->price,
                        'quantity' => 1,
                    ];

                    if (count(array_keys($cart)) == 1) {
                        Session::put('cart',
                            [ $resellerId => [ 
                                array_keys($cart[$resellerId])[0] => array_values($cart[$resellerId])[0], 
                                $product->id => $productInfo
                            ]
                        ]);
                    } else {
                        Session::put('cart', [ $resellerId => [ 
                                array_keys($cart[$resellerId])[0] => array_values($cart[$resellerId])[0], 
                                $product->id => $productInfo
                            ],
                            array_keys($cart)[0] => array_values($cart)[0],
                        ]);
                    }
                }
            } else {
                $productInfo = [
                    'id' =>  $product->id,
                    'name' =>  $product->name,
                    'sku' =>  $product->sku,
                    'price' =>  $product->price,
                    'quantity' => 1,
                ];

                Session::put('cart', [
                    array_keys($cart)[0] => array_values($cart)[0],
                    $resellerId => [ $product->id => $productInfo ]
                ]);
            }
        } else {
            $productInfo = [
                'id' =>  $product->id,
                'name' =>  $product->name,
                'sku' =>  $product->sku,
                'price' =>  $product->price,
                'quantity' => 1,
            ];
            Session::put('cart', [ $resellerId => [ $product->id => $productInfo ] ]);
        }

        Session::save();

        return redirect()->route('shoppingcart');
    }
}
