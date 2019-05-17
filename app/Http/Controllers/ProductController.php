<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {

    }
    
    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $products=Product::all();
        $orderBy = $request->get('order_by');
        $productInstance = new Product();
        $products = $productInstance->orderProducts($orderBy);
        if($request->ajax()){
            return response()->json($products, 200);
        }

        return view('products.index', compact('products'));
    }
    // /**
    //  * Show the application dashboard.
    //  * 
    //  * @return \Illuminate\Controller\Support\Rendrable
    //  */
    // public function index()
    // {
    //     $products=Product::all();
    //     return view('products.index', compact('products'));
    // }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function image($imageName)
    {
        $filePath = storage_path(public_path().'/images', $imageName);
        return Image::make($filePath)->response();
    }
}