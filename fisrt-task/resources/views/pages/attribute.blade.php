@extends('pages.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Create New Attribute</div>
    <div class="card-body">

        <form action="{{route('attribute.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="product_id" value="{{$product->id}}">
           
            <div class="d-flex">
                <div class="col-6 pe-3">
                    <label for="name_en">Name</label><br>
                    <input type="text" name="name_en" id="name_en" class="form-control"><br>
                </div>
                <div class="col-6">
                    <label for="name_ar" style="direction: rtl;">الاسم</label><br>
                    <input type="text" name="name_ar" id="name_ar" class="form-control"><br>
                </div>

            </div>
            <div class="d-flex">
                <div class="col-3 pe-3">
                    <label for="discount_type">Discount Type</label><br>
                    <select name="discount_type" id="discount_type" class="form-control">
                    <option value="percentage" selected>Percentage</option>
                        <option value="fixed">Fixed</option>
                        <option value="other">none</option>
                    </select><br>
                </div>

                <div class="col-3 pe-3">
                    <label for="discount_amount">discount_amount</label><br>
                    <input type="text" name="discount_amount" id="discount_amount" class="form-control"><br>
                </div>
                <div class="col-3 pe-3">
                    <label for="quantity">quantity</label><br>
                    <input type="number" min="0" name="quantity" id="quantity" class="form-control"><br>
                </div>
                <div class="col-3">
                    <label for="price">price</label><br>
                    <input type="number" min="0" name="price" id="price" class="form-control"><br>
                </div>

            </div>


            <input name="link" type="file" class="form-control white-input" id="link"></br>

            <div class="d-flex gap-1">

            <input type="submit" value="Save" class="btn btn-success"></br>
            <a href="{{route('product.show', $product->id)}}" class="btn btn-primary btn-sm">Back</a>
</div>
        </form>

    </div>
</div>

@endsection