@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('institutes.create') }}" class="btn btn-primary mb-3">Add Institute</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($institutes as $institute)
                <tr>
                    <td>{{ $institute->name }}</td>
                    <td>{{ $institute->contact_number }}</td>
                    <td>{{ $institute->email }}</td>
                    <td>{{ $institute->status }}</td>
                    <td>
                        <a href="{{ route('institutes.edit', $institute->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
