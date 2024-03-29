@extends('pages.layout')
@section('content')

<div class="card" style="margin:20px;">
@if (Session::has('status'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Message',
                            text: "{{ Session::get('status') }}",
                            icon: 'success',
                            showConfirmButton: true,
                            confirmButtonText: "OK",
                        });
                    });
                </script>
            @endif

    <div class="card-header">product Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title text-center mb-5"> {{ $product->name_en }}-{{ $product->name_ar }}</h5>

            <div class="d-flex mb-5">

                <div class="col-6">
                    <p>{!! $product->long_d_en !!}</p>
                </div>
                <div style="direction: rtl;" class="col-6">
                    <p>{!! $product->long_d_ar !!}</p>
                </div>
            </div>

            <div class="d-flex gap-1">
                <a href="{{route('attribute.show',$product->id)}}" class="btn btn-success btn-sm" title="Add New car">
                    Add New Attribute
                </a>
                <hr>
                <a href="{{route('product.index')}}" class="btn btn-primary btn-sm">Back</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Attribute</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Discount_type</th>
                        <th>Discount_amount</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attributes as $item)

                    <tr>
                        <td>{{ $item->name_en }}-{{$item->name_ar}}</td>
                        <td><a href="#"><img src="{{ url('/images/' . $item->images->link ) }}" width="100px"
                                    height="100px" alt="Avatar"></a></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->discount_type }}</td>
                        <td>{{ $item->discount_amount }}</td>
                        <td>{{ $item->quantity }}</td>

                        <td>
                            <form method="POST" action="{{route('attribute.destroy',$item->id)}}" accept-charset="UTF-8"
                                style="display:inline">
                                @method("Delete")
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete car"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        </hr>
    </div>
</div>
@endsection