<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=car::all();
        return view('pages.index',compact('cars'));
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
        $car = new Car;

$car->type = $request->type;
$car->model_year = $request->model_year;
$car->color = $request->color;

if ($request->hasFile('image')) {
    $image = $request->file('image');
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
    $car->image = $imageName;
    
}

$car->save();
return redirect('car')->with('status', 'Car Added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = car::find($id);
        return view('pages.show',compact("car"));
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = car::find($id);
        return view('pages.edit',compact("car"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        


        $car = car::find($id);

        $car->type = $request->input('type');
        $car->model_year = $request->input('model_year');
        $car->color = $request->input('color');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); 
            $car->image = $imageName;
        }
        

        $car->save();
        return redirect('car')->with('status', 'Car Updated!');  
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        car::destroy($id);
        return redirect('car')->with('status', 'Car Deleted successfully!'); 

    }
}
