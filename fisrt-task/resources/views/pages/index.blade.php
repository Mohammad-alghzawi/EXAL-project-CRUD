@extends('pages.layout')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Main task</h2>
                </div>
                <div class="card-body">
                    <a href="{{route('product.create')}}" class="btn btn-success btn-sm" title="Add New car">
                        Add New Product
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Name-الاسم</th>
                                    <th>Short description</th>
                                    <th>شرح قصير</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)

                                <tr>
                                    <td>{{ $item->SKU }}</td>
                                    <td>{{ $item->name_en }}-{{$item->name_ar}}</td>
                                    <td>{{ $item->short_d_en }}</td>
                                    <td>{{ $item->short_d_ar }}</td>
                                    <td>{{ $item->category }}</td>



                                    <td>
                                        <a href="{{route('product.show',$item->id)}}" title="View product"><button
                                                style="color:white" class="btn btn-info btn-sm"><i style="color:white"
                                                    class="fa-solid fa-eye"></i> View</button></a>
                                        <a href="" title="Edit car"><button class="btn btn-primary btn-sm"><i
                                                    class="fa-solid fa-pen"></i> Edit</button></a>

                                        <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection