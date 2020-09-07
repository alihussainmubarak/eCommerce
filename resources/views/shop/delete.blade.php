@extends('layouts.app')

@section('content')
    <h1>Delete prodect</h1>

    <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Product name</th>
            <th scope="col">Price</th>
            <th scope="col">Data of created</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($shop as $item)

        <tbody>
          <tr class="border-top">
            <td class="align-middle"><img style="height: 75px" src="{{ asset('storage/'. $item->image) }}" alt=""></td>
            <td class="align-middle">{{ $item->name }}</td>
            <td class="align-middle">$ {{ $item->price }}</td>
            <td class="align-middle">{{ $item->created_at }}</td>
            <td class="align-middle">
                <form action="{{ url('shop/'. $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
    
@endsection