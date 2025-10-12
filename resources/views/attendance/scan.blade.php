@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<h1>Scan Student QR for Attendance</h1>

<video id="preview" width="100%" height="400"></video>

<form id="attendanceForm" method="POST" action="{{ route('attendance.store') }}">
    @csrf
    <input type="hidden" name="student_code" id="student_code">
    <input type="hidden" name="class_id" value="{{ $class_id }}"> 
</form>
</div>
@endsection



@section('script')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
scanner.addListener('scan', function (content) {
    // content = student_code
    document.getElementById('student_code').value = content;
    document.getElementById('attendanceForm').submit();
});
Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        scanner.start(cameras[0]);
    } else {
        alert('No cameras found.');
    }
}).catch(function (e) {
    console.error(e);
});
</script>
@endsection
