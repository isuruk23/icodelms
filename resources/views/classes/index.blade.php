@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Add Class</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Course</th>
                <th>Teacher</th>
                <th>Branch</th>
                <th>Schedule</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->class_code }}</td>
                    <td>{{ $class->class_name }}</td>
                    <td>{{ $class->course->course_name ?? '-' }}</td>
                    <td>{{ $class->teacher->full_name ?? '-' }}</td>
                    <td>{{ $class->branch->branch_name ?? '-' }}</td>
                    <td>{{ $class->schedule }}</td>
                    <td>
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('attendance.scan', $class->id) }}" class="btn btn-success btn-sm">
            Take Attendance
        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
