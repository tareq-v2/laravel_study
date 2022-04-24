@extends('Backend.master')
@section('content')
    <div class="container-fluid add-admin-form">
        <div class="row">
            <div class="col-12">
                <div class="form-title-layer">
                    <h5><i class="fas fa-users"></i>&nbsp;&nbsp;Add Category</h5>
                </div>
            </div>
        </div>

        @include('Backend.Validation')

        <form action="{{ url('/category-info') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label>SL</label>
                </div>
                <div class="col-10">
                    <input type="number" class="form-control" name="sl" value="{{ old('title') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Item</label>
                </div>
                <div class="col-10">
                    {{-- <input type="text" class="form-control" name="item_id"> --}}
                    <select class="form-control" name="item_id">
                        @if ($itemdata)
                        @foreach ($itemdata as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Category Name</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Category Icon</label>
                </div>
                <div class="col-10">
                    <input type="file" class="form-control" name="icon">
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <input type="submit"  class="btn btn-success" value="Create">
                    <a href="{{ url('/category-info') }}"class="btn btn-warning">View</a>
                </div>
            </div>
        </form>
    </div>
@endsection
