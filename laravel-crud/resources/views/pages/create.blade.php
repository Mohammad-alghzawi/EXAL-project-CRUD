@extends('pages.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New car</div>
  <div class="card-body">
       
      <form action="{{ route('car.store') }}" method="post">
      @csrf
        <label>Type</label></br>
        <input type="text" name="type" id="type" class="form-control"></br>
        <label>Model</label></br>
        <input type="number" name="model_year" id="model_year" class="form-control"></br>
        <label>Color</label></br>
        <input type="text" name="color" id="color" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop