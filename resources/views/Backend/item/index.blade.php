@extends('Backend.master')
@section('content')
<table class="table">
    <tr>
        <td>Item ID</td>
        <td>Title</td>
        <td>Icon</td>
        <td>Action</td>
    </tr>
    @if ($data)
    @foreach ($data as $showdata)

    <tr>
        <td>{{ $showdata->id }}</td>
        <td>{{ $showdata->title }}</td>
        <td>
            <img src="{{ asset('/Backend/ItemImage/'.$showdata->icon) }}" width="200" height="100">
        </td>
        <td>
            <a class="btn btn-success btn-sm" href="{{ url('/item-info') }}/{{ $showdata->id }}/edit">Edit</a>
            <form action="{{ url('/item-info') }}/{{ $showdata->id }}" method="post">
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
