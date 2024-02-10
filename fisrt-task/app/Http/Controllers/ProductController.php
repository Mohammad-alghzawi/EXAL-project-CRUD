<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        // dd($request);
        $validatedData = [
            'SKU' => $request->input('SKU'),
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'short_d_en' => $request->input('short_d_en'),
            'short_d_ar' => $request->input('short_d_ar'),
            'long_d_en' => $request->input('long_d_en'),
            'long_d_ar' => $request->input('long_d_ar'),
            'category' => $request->input('category'),
        ];
        
        // Validate the data
        $validator = Validator::make($validatedData, [
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

      
        return redirect('product')->with('status', 'product Added successfully');    }

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
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->SKU = $request->input('SKU');
        $product->name_en = $request->input('name_en');
        $product->name_ar = $request->input('name_ar');
        $product->short_d_en = $request->input('short_d_en');
        $product->short_d_ar = $request->input('short_d_ar');
        $product->long_d_en = $request->input('long_d_en');
        $product->long_d_ar = $request->input('long_d_ar');
        $product->category = $request->input('category');

        
        $product->save();
        return redirect('product')->with('status', 'product Updated');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);
        } catch (\Throwable $th) {
            return redirect('product')->with('wrong', 'we can not delete this produt because have attributes inside!'); 

        }
        
        return redirect('product')->with('status', 'Product Deleted successfully!'); 
    }
}
