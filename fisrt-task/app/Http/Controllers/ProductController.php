<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('pages.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SKU' => 'required',
            'name_en' => 'required',
            'name_ar' => 'required',
            'short_d_en' => 'required',
            'short_d_ar' => 'required',
            'long_d_en' => 'required',
            'long_d_ar' => 'required',
            'category' => 'required',
        ]);

        // Create a new Product instance
        $product = new Product();
        $product->SKU = $validatedData['SKU'];
        $product->name_en = $validatedData['name_en'];
        $product->name_ar = $validatedData['name_ar'];
        $product->short_d_en = $validatedData['short_d_en'];
        $product->short_d_ar = $validatedData['short_d_ar'];
        $product->long_d_en = $validatedData['long_d_en'];
        $product->long_d_ar = $validatedData['long_d_ar'];
        $product->category = $validatedData['category'];
        
    
        $product->save();

      
        return redirect('product')->with('status', 'Car Added successfully!');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        $attributes=Attribute::where('product_id',$id)->get();
        return view('pages.show', compact('product', 'attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
