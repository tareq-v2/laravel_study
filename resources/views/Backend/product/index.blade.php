@extends('Backend.master')
@section('content')
<table class="table">
    <tr>
        <td>Product ID</td>
        <td>Product Name</td>
        <td>Product Price</td>
        <td>Product Old Price</td>
        <td>Image</td>
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
            <img src="{{ asset('/Backend/productImage/'.$showdata->image) }}" width="200" height="100">
        </td>
        <td>
            <a class="btn btn-sm btn-success" href="{{ url('/product-info') }}/{{ $showdata->id }}/edit">Edit</a>
            <span>
                <form action="{{ url('/product-info') }}/{{ $showdata->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure to delete this?')">
                        Delete
                    </button>
                </form>
            </span>
        </td>
    </tr>
    @endforeach
    @endif
</table>
@endsection
