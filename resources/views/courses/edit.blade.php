@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Course</h3>
    <form method="POST" action="{{ route('courses.update', $course->id) }}">
        @csrf
        @method('PUT')
        @include('courses.form', ['course' => $course])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
