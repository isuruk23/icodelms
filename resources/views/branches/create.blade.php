@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Branch</h3>
    <form method="POST" action="{{ route('branches.store') }}">
        @csrf
        @include('branches.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
