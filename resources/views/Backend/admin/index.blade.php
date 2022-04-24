@extends('Backend.master')
@section('content')
<table class="table">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Addres</td>
        <td>Action</td>
    </tr>
    @if ($data)
    @foreach ($data as $showdata)

    <tr>

        <td>{{ $showdata->name }}</td>
        <td>{{ $showdata->email }}</td>
        <td>{{ $showdata->phone }}</td>
        <td>{{ $showdata->address }}</td>
        <td>
            <a class="btn btn-success btn-sm" href="{{ url('/admin-info') }}/{{ $showdata->id }}/edit">Edit</a>
            <form action="{{ url('/admin-info') }}/{{ $showdata->id }}" method="post">
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
