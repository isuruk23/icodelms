@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ isset($class) ? 'Edit Class' : 'Add Class' }}</h3>
    <form method="POST" action="{{ isset($class) ? route('classes.update', $class->id) : route('classes.store') }}">
        @csrf
        @if(isset($class)) @method('PUT') @endif
        @include('classes.form', ['class' => $class ?? null])
        <button type="submit" class="btn btn-primary">{{ isset($class) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection
