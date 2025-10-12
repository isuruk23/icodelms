@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Institute</h3>
    <form method="POST" action="{{ route('institutes.store') }}">
        @csrf
        @include('institutes.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
