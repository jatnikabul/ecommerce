<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class CartController extends Controller
{
    public function __construdct()
    {

    }

    public function index()
    {
        return view('carts.index');
    }

    public function add($id)
    {
        $product = Product::with('images')->find($id);
        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image_url" => $product->images()->first()->image_src
                    ]
            ];

            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart successfuly!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart successfuly!');
        }

        // if item not exist in cart then add cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image_url" => $product->images()->first()->image_src
        ];

        session()->put('cart', $cart);

        return redirect('/carts')->with('success', 'Product added to cart successfuly!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('succes', 'Cart update successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                    
                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
        }

        session()->flash('success', 'Prodcut removed successfuly');
    }
}