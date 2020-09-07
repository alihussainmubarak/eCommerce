
@extends('layouts.app')

@section('content')
    <h1>Shop</h1>

    <div class="row">

    @foreach ($shop as $item)
    <div class="col-md-4">
        <div class="card my-3">
            <img class="w-100" src="{{ asset('storage/'. $item->image) }}" alt="">
            <div class="card-body">
                <h5>{{ $item->name }}</h5>
                <hr>
                <p>{{ $item->description }}</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-success btn-sm float-left" href="{{ url('shop/'. $item->id) }}">Add to cart</a>
                <b class="float-right">$ {{ $item->price }}</b>
            </div>
        </div>
    </div>
    
       @endforeach
    </div>
@endsection