@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Teacher</h3>
    <form method="POST" action="{{ route('teachers.store') }}">
        @csrf
        @include('teachers.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
