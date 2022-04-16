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

        @include('Backend.Validation')

        <form action="{{ url('/admin-info') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Name</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="name" placeholder="ex:Monjur San" value="{{ old('name') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Email</label>
                </div>
                <div class="col-10">
                    <input type="email" class="form-control" name="email" placeholder="ex:Demo@gmail.com"  value="{{ old('email') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Mobile</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="phone" placeholder="ex:01XXXXXXXXX"  value="{{ old('phone') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Address</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="address" placeholder="ex:Feni"  value="{{ old('address') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin password</label>
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" name="password" placeholder="ex:1234..."  value="{{ old('password') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Confirm password</label>
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" name="confirm_password" placeholder="ex:1234..."  value="{{ old('confirm_passeord') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Status</label>
                </div>
                <div class="col-10">
                 <select class="form-control" name="status">
                     <option value="1">Active</option>
                     <option value="0">Inactive</option>
                 </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <input type="submit"  class="btn btn-success" value="Create">
                    <a href="#"class="btn btn-warning">View</a>
                </div>
            </div>
        </form>
    </div>
@endsection
