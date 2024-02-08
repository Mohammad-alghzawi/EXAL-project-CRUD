@extends('pages.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit car</div>
  <div class="card-body">
       
      <form action="{{route('car.update',$car->id)}}" method="post">
        @csrf
        @method("put")
        <input type="hidden" name="id" id="id" value="{{$car->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="type" id="name" value="{{$car->type}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="model_year" id="address" value="{{$car->model_year}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="color" id="mobile" value="{{$car->color}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop