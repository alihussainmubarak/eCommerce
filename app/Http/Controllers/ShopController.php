<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.index', ['shop' => Shop::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $filename);
        }

        $validation = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $validation = new Shop;

        $validation->user_id = auth()->user()->id;
        $validation->name = $request->input('name');
        $validation->price = $request->input('price');
        $validation->description = $request->input('description');
        $validation->image = $filename;

        $validation->save();

        return redirect('shop');
    }

    public function cart()
    {
        return view('shop.cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Shop::find($id);

        $cart = session()->get('cart');

        if (empty($cart[$id])) {

            $cart[$id] = array(
                'image' => $item->image,
                'name' => $item->name,
                'price' => $item->price,
                'description' => $item->description,
                'quantity' => 1
            );

            session()->put('cart', $cart);
        } elseif ($cart[$id]['quantity']++) {
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Shop::find($id);

        Storage::delete('public/'. $product->image);

        $product->delete();

        return redirect()->back();
    }

    public function delete()
    {
        return view('shop.delete', ['shop' => Shop::all()]);
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
            return redirect()->back();
        }
    }
}
