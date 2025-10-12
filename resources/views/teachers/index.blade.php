@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Branch</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Expertise</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->full_name }}</td>
                    <td>{{ $teacher->branch->branch_name ?? '-' }}</td>
                    <td>{{ $teacher->contact_number }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->expertise }}</td>
                    <td>{{ $teacher->status }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
