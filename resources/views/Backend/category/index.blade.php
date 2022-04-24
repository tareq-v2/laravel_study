@extends('Backend.master')
@section('content')
<table class="table">
    <tr>
        <td>Category ID</td>
        <td>SL</td>
        <td>Category Name</td>
        <td>Icon</td>
        <td>Action</td>
    </tr>
    @if ($data)
    @foreach ($data as $showdata)

    <tr>

        <td>{{ $showdata->id }}</td>
        <td>{{ $showdata->sl }}</td>
        <td>{{ $showdata->category_name }}</td>
        <td>
            <img src="{{ asset('/Backend/categoryImage/'.$showdata->icon) }}" width="200" height="150">
        </td>
        <td>
            <a class="btn btn-success btn-sm" href="{{ url('/category-info') }}/{{ $showdata->id }}/edit">Edit</a>
            <form action="{{ url('/category-info') }}/{{ $showdata->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    @endif
</table>
@endsection
