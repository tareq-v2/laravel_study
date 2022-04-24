@extends('Backend.master')
@section('content')
    <div class="container-fluid add-admin-form">
        <div class="row">
            <div class="col-12">
                <div class="form-title-layer">
                    <h5><i class="fas fa-users"></i>&nbsp;&nbsp;Add Item</h5>
                </div>
            </div>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="btn btn-success close" data-dismiss="alert">×</button>
                    <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

        <form action="{{url('item-info')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Item Name</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
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
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <input type="submit"  class="btn btn-success" value="Create">
                    <a href="{{ url('item-info') }}"class="btn btn-warning">View</a>
                </div>
            </div>
        </form>
    </div>
@endsection
