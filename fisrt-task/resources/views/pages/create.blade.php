@extends('pages.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Create New product</div>
    <div class="card-body">

        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label>SKU</label></br>
            <input type="number" name="SKU" id="SKU" class="form-control"></br>

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
                <div class="col-6 pe-3">
                    <label for="short_d_en">Short description</label><br>
                    <textarea name="short_d_en" id="short_d_en" class="form-control"></textarea><br>
                </div>
                <div class="col-6">
                    <label for="short_d_ar" style="direction: rtl;">شرح قصير</label><br>
                    <textarea name="short_d_ar" id="short_d_ar" class="form-control"></textarea><br>
                </div>

            </div>


            <div class="d-flex">
                <div class="col-6 pe-3">
                    <label for="long_d_en">Long description</label><br>
                    <textarea name="long_d_en" id="long_d_en" class="form-control"></textarea><br>
                </div>
                <div class="col-6">
                    <label for="long_d_ar" style="direction: rtl;">شرح طويل</label><br>
                    <textarea name="long_d_ar" id="long_d_ar" class="form-control"></textarea><br>
                </div>

            </div>






            <label>Category</label></br>
            <input type="text" name="category" id="category" class="form-control"></br>
            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>

    </div>
</div>

@stop