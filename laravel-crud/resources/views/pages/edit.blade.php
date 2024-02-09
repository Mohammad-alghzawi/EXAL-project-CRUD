@extends('pages.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit car</div>
  <div class="card-body">
       
      <form action="{{route('car.update',$car->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <input type="hidden" name="id" id="id" value="{{$car->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="type" id="name" value="{{$car->type}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="model_year" id="address" value="{{$car->model_year}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="color" id="mobile" value="{{$car->color}}" class="form-control"></br>
        <label>Image</label></br>
        <input  name="image" type="file" class="form-control white-input" >
       <img src="/images/{{ $car->image }}" width="150px" class="mt-4">  </br></br>
       <div class="d-flex gap-1">
       
        <input type="submit" value="Update" class="btn btn-success">
         <a  href="{{route('car.index')}}" class="btn btn-primary btn-sm">Back</a>
        </div>

    </form>

  </div>
</div>
  
@stop