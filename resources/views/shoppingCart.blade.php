@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="row">
                <div class="col-sm-8"><h3>Shopping Cart</h3></div>
            </div>
            <br>
            <div class="row">
                @if($cartProducts)
                    <div class="col-sm-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $orderTotal = 0;
                                @endphp
                                @foreach ($cartProducts as $products)
                                    @foreach ($products as $product)
                                        @php
                                            $productTotal = $product['price']*$product['quantity'];
                                            $orderTotal += $productTotal;
                                        @endphp
                                        <tr>
                                            <th scope="row"><img class="align-self-start mr-3" src='/placeholder.svg' width="60px;">
                                            <th>{{ $product['name'] }}</th>
                                            <td>{{ $product['sku'] }}</td>
                                            <td>{{ $product['quantity'] }}</td>
                                            <td>£{{ $product['price'] }}</td>
                                            <td>£{{ $productTotal }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="col-sm-6 offset-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">£{{ $orderTotal }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-secondary" onClick=window.location="{{ route('reseller') }}">Continue Shopping</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" onClick=window.location="{{ route('checkout') }}" class="btn btn-success float-right">Checkout</button>
                    </div>
                @else
                <hr>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-secondary float-right" onClick=window.location="{{ route('reseller') }}">Continue Shopping</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
