@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="row">
                <div class="col-sm-8"><h3>Reseller Products</h3></div>
                <div class="col-sm-4"><button type="button" class="btn btn-secondary float-right" onClick=window.location="{{url('/')}}">Back</button></div>
            </div>
            <hr>
            <div class="row">
                @if(!$resellerProducts->product->isEmpty())
                    @foreach ($resellerProducts->product as $product)
                        <div class="col-sm-4">
                            <div class="card p-3">
                                <div class="media">
                                    <img class="align-self-start mr-3" src='/placeholder.svg' width="100px;">
                                    <div class="media-body align-self-center">
                                        <div class="row">
                                            <dt class="col-sm-4">Name</dt>
                                            <dd class="col-sm-8">{{ $product->name }}</dd>
                                            <dt class="col-sm-4">SKU</dt>
                                            <dd class="col-sm-8">{{ $product->sku }}</dd>
                                            <dt class="col-sm-4">Price</dt>
                                            <dd class="col-sm-8">£{{ $product->price }}</dd>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <button type="button" onClick=window.location="{{ route('addToCart', ['reseller' => $resellerProducts->id , 'product' => $product->id ]) }}" class="btn btn-success">Add to Cart</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-sm-12">There is no product in reseller {{ $resellerProducts->name }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
