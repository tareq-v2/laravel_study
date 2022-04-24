@extends('Backend.master')
@section('content')
    <div class="container-fluid add-admin-form">
        <div class="row">
            <div class="col-12">
                <div class="form-title-layer">
                    <h5><i class="fas fa-users"></i>&nbsp;&nbsp;Update Item</h5>
                </div>
            </div>
        </div>
        <form action="{{ url('/item-info') }}/{{ $data->id }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Item Name</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label>Icon</label>
                </div>
                <div class="col-10">
                    <input type="file" class="filestyle" name="image" accept="image/*" />
                </div>
            </div>
            <span>
                <img src="{{ asset('/Backend/ItemImage/'.$data->icon) }}" width="200" height="150">
            </span>
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <button class="btn btn-warning" type="submit">
                        <a href="{{ url('item-info') }}">Update</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
