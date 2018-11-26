@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="row">
                @foreach ($resellers as $reseller)
                    <div class="col-sm-4">
                        <a class="card p-3" href="{{ url('/reseller/'.$reseller->code) }}">
                            <div class="media">
                                <img class="align-self-center mr-3" src='/placeholder.svg' width="100px;">
                                <div class="media-body align-self-center">
                                    <h4 class="mt-0">{{ $reseller->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
