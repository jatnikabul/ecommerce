<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where(['user_id' => Auth::user()->id])->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = strip_tags($request->post('description'));
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                if($idx == 0) {
                    $product->image_url = $file->getClientOriginalName();
                }
            }
        }
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $image = new Image();
                $image->image_title = $product->name;
                $image->image_src = $file->getClientOriginalName();
                $image->image_desc = $product->description;
                $product->images()->save($image);
                $file->move(public_path().'/images', $image->image_src);
            }
        }

        return redirect('admin/products')->with('success', 'Product success created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where(['user_id' => Auth::user()->id])->with('images')->findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where(['user_id' => Auth::user()->id])->findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product = Product::where(['user_id' => Auth::user()->id])->findOrFail($id);
        $product->user_id = Auth::user()->id;
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = strip_tags($request->post('description'));
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                if($idx == 0) {
                    $product->image_url = $file->getClientOriginalName();
                }
            }
        }
        $product->save();
        if ($request->hasFile('images')) {
            $product->images()->delete();
            foreach ($request->file('images') as $file) {
                $image = new Image();
                $image->image_title = $product->name;
                $image->image_src = $file->getClientOriginalName();
                $image->image_desc = $product->description;
                $product->images()->save($image);
                $file->move(public_path().'/images', $image->image_src);
            }
        }

        return redirect('admin/products')->with('success', 'Product success updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where(['user_id' => Auth::user()->id])->findOrFail($id);
        $product->delete();

        return redirect('admin/products')->with('success', 'Product success deleted.');
    }
}
