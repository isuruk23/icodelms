@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Branch</h3>
    <form method="POST" action="{{ route('branches.update', $branch->id) }}">
        @csrf
        @method('PUT')
        @include('branches.form', ['branch' => $branch])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
