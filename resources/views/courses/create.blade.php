@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Course</h3>
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        @include('courses.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
