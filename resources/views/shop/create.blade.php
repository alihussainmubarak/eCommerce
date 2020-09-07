@extends('layouts.app')

@section('content')
<h1>Create</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('shop.store') }}" enctype="multipart/form-data">
    <div class="form-group">
        @csrf            
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name"/>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" placeholder="Price"/>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Add description"></textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" name="image" placeholder="Image"/>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection