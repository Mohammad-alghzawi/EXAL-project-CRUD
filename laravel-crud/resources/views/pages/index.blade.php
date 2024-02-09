@extends('pages.layout')
@section('content')
    <div class="container">
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
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>CRUD (Create, Read, Update and Delete)</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('car.create') }}" class="btn btn-success btn-sm" title="Add New car">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Model by year</th>
                                        <th>Color</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $item)
    <tr>
        <td>{{ $item->type }}</td>
        <td>{{ $item->model_year }}</td>
        <td>{{ $item->color }}</td>
        <td><a href="#"><img src="{{ url('/images/' . $item->image) }}" width="100px"
                                                height="100px" alt="Avatar"></a></td>

        <td>
            <a href="{{route('car.show',$item->id)}}" title="View car"><button style="color:white" class="btn btn-info btn-sm"><i style="color:white" class="fa-solid fa-eye"></i> View</button></a>
            <a href="{{route('car.edit',$item->id)}}" title="Edit car"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> Edit</button></a>

            <form method="POST" action="{{route('car.destroy',$item->id)}}" accept-charset="UTF-8" style="display:inline">
            @method("Delete")
               @csrf
                <button type="submit" class="btn btn-danger btn-sm" title="Delete car"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </td>
    </tr>
@endforeach

                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection