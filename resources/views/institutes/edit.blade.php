@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Institute</h3>
    <form method="POST" action="{{ route('institutes.update', $institute->id) }}">
        @csrf
        @method('PUT')
        @include('institutes.form', ['institute' => $institute])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
