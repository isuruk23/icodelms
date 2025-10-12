@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Branch</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_code }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->branch->branch_name ?? '-' }}</td>
                    <td>{{ $student->contact_number }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
