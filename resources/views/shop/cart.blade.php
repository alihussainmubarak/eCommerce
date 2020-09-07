@extends('layouts.app')

@section('content')

<h1>My cart</h1>

<table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Item name</th>
        <th scope="col">Price</th>
        <th scope="col">Total price</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <div class="d-none">{{ $total = 0 }}</div>

@if (session('cart'))    

    @foreach (session('cart') as $id => $item)

    <div class="d-none">{{ $total += $item['price'] * $item['quantity'] }}</div>
        
    <tbody class="border-top">
      <tr>
        <td class="align-middle"><img style="height: 75px" src="{{ asset('storage/'. $item['image']) }}" alt=""></td>
        <td class="align-middle">{{ $item['name'] }} <span class="badge badge-success">{{ $item['quantity'] }}</span></td>
        <td class="align-middle">$ {{ $item['price'] }}</td>
        <td class="align-middle">$ {{ $item['price'] * $item['quantity'] }}</td>
        <td class="align-middle">
          <form action="{{ url('remove/'. $id) }}" method="post">
            @csrf
            @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
        </form>
        </td>
      </tr>
    </tbody>

    @endforeach

    @endif

    <tbody>
      <tfoot>
        <tr>
          <td>Total: {{ $total }}</td>
        </tr>
      </tfoot>
    </tbody>

  </table>

@endsection
