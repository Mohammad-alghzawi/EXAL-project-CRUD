@extends('pages.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Car Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Type : {{ $car->type }}</h5>
        <p class="card-text">Model : {{ $car->model_year }}</p>
        <p class="card-text">Color : {{ $car->color }}</p>
  </div>
    </hr>
  </div>
</div>
@endsection