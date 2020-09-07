@extends('layouts.app')

@section('content')

    <div class="jumbotron my-5 text-center">
        <h1 class="display-4">eCommerce</h1>
        <hr>
        <br>
        <a class="btn btn-danger btn-lg" href="{{ url('shop') }}">Go to shop</a>
    </div>
    
@endsection

