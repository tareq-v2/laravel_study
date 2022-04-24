@extends('Backend.master')
@section('content')
    <div class="container-fluid add-admin-form">
        <div class="row">
            <div class="col-12">
                <div class="form-title-layer">
                    <h5><i class="fas fa-users"></i>&nbsp;&nbsp;Update Admin</h5>
                </div>
            </div>
        </div>

        @include('Backend.Validation')

        <form action="{{ url('/admin-info') }}/{{ $info->id }}" method="post" accept-charset="utf-8" enctype="multipart/form-info">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Name</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="name" value="{{ $info->name }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Email</label>
                </div>
                <div class="col-10">
                    <input type="email" class="form-control" name="email" value="{{ $info->email }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Mobile</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="phone" value="{{ $info->phone }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Address</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="address" value="{{ $info->address }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin password</label>
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Confirm password</label>
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" name="confirm_password">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="item_name">Admin Status</label>
                </div>
                <div class="col-10">
                 <select class="form-control" name="status">
                     @if ($info->status == 0)
                     <option value="0" selected>Inactive</option>
                     <option value="1">Active</option>
                     @elseif($info->status == 1)
                     <option value="1" selected>Active</option>
                     <option value="0">Inactive</option>
                     @endif
                 </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <button class="btn btn-info btn-sm" type="submit">
                        Update
                        {{-- <a href="{{ url('admin-info') }}">Update</a> --}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
