@extends('pages.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New car</div>
  <div class="card-body">
       
      <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
      @csrf
        <label>Type</label></br>
        <input type="text" name="type" id="type" class="form-control"></br>
        <label>Model</label></br>
        <input type="number" name="model_year" id="model_year" class="form-control"></br>
        <label>Color</label></br>
        <input type="text" name="color" id="color" class="form-control"></br>
        <input  name="image" type="file" class="form-control white-input" id="inputPrice"></br>
        <div class="d-flex gap-1">
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a  href="{{route('car.index')}}" class="btn btn-primary btn-sm">Back</a>
       </div>
    </form>
    
  </div>
</div>
  
@stop