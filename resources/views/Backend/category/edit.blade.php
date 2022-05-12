@extends('Backend.master')
@section('content')
    <div class="container-fluid add-admin-form">
        <div class="row">
            <div class="col-12">
                <div class="form-title-layer">
                    <h5><i class="fas fa-users"></i>&nbsp;&nbsp; Update Category</h5>
                </div>
            </div>
        </div>

        @include('Backend.Validation')

        <form action="{{ url('/category-info')}}/{{ $data->id  }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-2">
                    <label>SL</label>
                </div>
                <div class="col-10">
                    <input type="number" class="form-control" name="sl" value="{{ $data->sl }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Item Name</label>
                </div>
                <div class="col-10">
                    <select class="form-control" name="item_id">
                        @if ($items)
                        @foreach ($items as $ddd)
                        <option value="{{ $ddd->id }}"  @if($ddd->id == $data->item_id)selected @endif>{{ $ddd->title }}</option>
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
                    <input type="text" class="form-control" name="category_name" value="{{ $data->category_name }}">
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
                    <input type="submit"  class="btn btn-info" value="update">
                    <a href="{{ url('/category-info') }}"class="btn btn-warning">View</a>
                </div>
            </div>
        </form>
    </div>
@endsection
