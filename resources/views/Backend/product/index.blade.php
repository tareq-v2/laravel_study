@extends('Backend.master')
@section('content')
<table class="table">
    <tr>
        <td>Product ID</td>
        <td>Product Name</td>
        <td>Product Price</td>
        <td>Product Old Price</td>
        <td>Action</td>
    </tr>
    @if ($data)
    @foreach ($data as $showdata)

    <tr>

        <td>{{ $showdata->id }}</td>
        <td>{{ $showdata->name }}</td>
        <td>{{ $showdata->price }}</td>
        <td>{{ $showdata->old_price }}</td>
        <td>
            <button class="btn btn-sm btn-danger">
                <a href="{{ url('/product-info/destroy') }}">
                    Delete
                </a>
            </button>
        </td>
    </tr>
    @endforeach
    @endif
</table>
@endsection
