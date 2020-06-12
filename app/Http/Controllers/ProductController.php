<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $products = Product::all();
        return view('admin.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sku'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'product_image'=>'required|max:1',
        ]);
        $product = new Product();
        $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
        $x = str_shuffle($x);
        $x = substr($x,0,10);
        $product->slag = time().$x;
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        if ($request->hasFile('product_image')){
            $images = $request->product_image;
            foreach ($images as $img){
                $image = $img;
                $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $x = str_shuffle($x);
                $x = substr($x,0,5).'.DAC.';
                $filename = time().$x.$image->getClientOriginalExtension();
                Image::make($image->getRealPath())->resize(800, 800)->save(public_path('/upload/images/product-images/' . $filename));
                $product->image = $filename;
            }
        }
        $product->save();
        return redirect()->route('proudct.index')->withMessage('Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json(['data'=>[$product]]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'sku'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
        ]);
        $product = Product::find($id);
        $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
        $x = str_shuffle($x);
        $x = substr($x,0,10);
        $product->slag = time().$x;
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        if ($request->hasFile('product_image')){
            $image = $product->image;
            $path = 'upload/images/product-images/'.$image;
            unlink($path);
            $images = $request->product_image;
            foreach ($images as $img){
                $image = $img;
                $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $x = str_shuffle($x);
                $x = substr($x,0,5).'.DAC.';
                $filename = time().$x.$image->getClientOriginalExtension();
                Image::make($image->getRealPath())->resize(800, 800)->save(public_path('/upload/images/product-images/' . $filename));
                $product->image = $filename;
            }
        }
        $product->save();
        return redirect()->route('proudct.index')->withMessage('Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = $product->image;
        $path = 'upload/images/product-images/'.$image;
        unlink($path);
        $product->delete();
        return redirect()->route('proudct.index')->withMessage('Product Deleted Successfully');

    }
    public function bulkdestroy(Request $request)
    {
        $product_ids = $request->id;
        foreach ($product_ids as $product_id){
            $product = Product::find($product_id);
            $image = $product->image;
            $path = 'upload/images/product-images/'.$image;
            unlink($path);
            $product->delete();
        }
        return redirect()->route('proudct.index')->withMessage('Products Deleted Successfully');
    }
}
