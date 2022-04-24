@extends('Backend.master')
@section('content')
    <div class="container-fluid add-admin-form">
        <div class="row">
            <div class="col-12">
                <div class="form-title-layer">
                    <h5><i class="fas fa-users"></i>&nbsp;&nbsp;Add Product</h5>
                </div>
            </div>
        </div>

        @include('Backend.Validation')

        <form action="{{ url('/product-info') }}" method="post"enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-2">
                    <label>Product Name</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Item ID</label>
                </div>
                <div class="col-10">
                    <select class="form-control" name="item_id">
                        @if ($item)
                            @foreach ($item as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Category ID</label>
                </div>
                <div class="col-10">
                    <select class="form-control" name="category_id">
                        @if ($category)
                            @foreach ($category as $showCat)
                                <option value="{{ $showCat->id }}">{{ $showCat->category_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Product Price</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Product Old Price</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="old_price" value="{{ old('old_price') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Product Picture</label>
                </div>
                <div class="col-10">
                    <input type="file" class="form-control" name="image">
                </div>
            </div>

            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <input type="submit"  class="btn btn-success" value="Create">
                    <a href="{{ url('/product-info') }}"class="btn btn-warning">View</a>
                </div>
            </div>
        </form>
    </div>
@endsection
