@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h3>
    <form method="POST" action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($student)) @method('PUT') @endif
        @include('students.form', ['student' => $student ?? null])
        <button type="submit" class="btn btn-primary">{{ isset($student) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection
