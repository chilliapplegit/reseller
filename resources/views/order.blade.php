@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Order Id : {{ $order->id }}
                    <button type="button" class="btn btn-secondary float-right" onClick=window.location="{{ route('home') }}">Back</button>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order Item Id</th>
                                <th scope="col">Reseller Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Sku</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $resellerName = $order->reseller->name
                            @endphp
                            @foreach ($order->orderItem as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $resellerName }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->sku }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>£{{ $order->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
