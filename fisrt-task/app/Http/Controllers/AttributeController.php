<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("pages.attribute")->compact("id");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
{
 
    $validatedData = $request->validate([
        'product_id' => 'required',
        'name_en' => 'required',
        'name_ar' => 'required',
        'discount_type' => 'required',
        'discount_amount' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'link' => 'required',
    ]);

    

    $attribute = Attribute::create([
        'product_id' => $validatedData['product_id'],
        'name_en' => $validatedData['name_en'],
        'name_ar' => $validatedData['name_ar'],
        'discount_type' => $validatedData['discount_type'],
        'discount_amount' => $validatedData['discount_amount'],
        'quantity' => $validatedData['quantity'],
        'price' => $validatedData['price'],
    ]);

    $image = new Image();
    if ($request->hasFile('link')) {
        $img = $request->file('link');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        $img->move(public_path('images'), $imageName);
        $image->link = $imageName;
    }
    $image->attribute_id = $attribute->id;
    $image->save();

    
    return redirect()->route('product.show', ['product' => $validatedData['product_id']])->with('status', 'Attribute added successfuly');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product= Product::find($id);
        
        return view('pages.attribute', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $attribute= Attribute::find( $id );
        Attribute::destroy($id);
        return redirect()->route('product.show', ['product' => $attribute->product_id])->with('status', 'Attribute Deleted successfully!'); 
    }
}
