@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Add Branch</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Branch Name</th>
                <th>Institute</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->branch_code }}</td>
                    <td>{{ $branch->branch_name }}</td>
                    <td>{{ $branch->institute->name ?? '-' }}</td>
                    <td>{{ $branch->contact_number }}</td>
                    <td>{{ $branch->email }}</td>
                    <td>{{ $branch->status }}</td>
                    <td>
                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
