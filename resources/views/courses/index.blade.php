@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Duration (weeks)</th>
                <th>Fee</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->duration_weeks }}</td>
                    <td>{{ number_format($course->fee, 2) }}</td>
                    <td>{{ $course->status }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
