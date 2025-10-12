@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Teacher</h3>
    <form method="POST" action="{{ route('teachers.update', $teacher->id) }}">
        @csrf
        @method('PUT')
        @include('teachers.form', ['teacher' => $teacher])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
