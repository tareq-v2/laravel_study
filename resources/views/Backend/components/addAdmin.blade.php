@extends('Backend.master')
@section('content')
<div class="container-fluid add-admin-form">
    <div class="row">
        <div class="col-12">
            <div class="form-title-layer">
                <h5><i class="fas fa-users"></i>&nbsp;&nbsp;Add Admin</h5>
            </div>
        </div>
</div>
    <form action="{{ url('/create-admin') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-2">
                <label for="product_name">Admin Name</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="item_id">Email</label>
            </div>
            <div class="col-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="item_id">Phone</label>
            </div>
            <div class="col-10">
                <input type="number" class="form-control" name="phone">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="old_price">Address</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" name="address">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="sale_price">Password</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" name="password">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="description">Status</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" name="status" value="0">
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: center;">
                <input type="submit"  class="btn btn-success" name="submit"value="Create">
                <a href="#"class="btn btn-warning">View</a>
            </div>
        </div>
    </form>
</div>
@endsection
