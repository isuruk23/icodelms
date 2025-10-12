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
let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
let cameras = [];

// When QR code detected
scanner.addListener('scan', function (content) {
    document.getElementById('student_code').value = content;
    document.getElementById('attendanceForm').submit();
});

// Get available cameras
Instascan.Camera.getCameras().then(function (availableCameras) {
    cameras = availableCameras;
    const select = document.getElementById('cameraSelect');
    select.innerHTML = ''; // clear existing

    if (cameras.length === 0) {
        alert('No cameras found!');
        return;
    }

    // Populate dropdown
    cameras.forEach((camera, index) => {
        const option = document.createElement('option');
        option.value = index;
        option.text = camera.name || `Camera ${index + 1}`;
        select.appendChild(option);
    });

    // Start with back camera if available
    let defaultCam = cameras.find(cam => cam.name.toLowerCase().includes('back')) || cameras[0];
    scanner.start(defaultCam);
    select.value = cameras.indexOf(defaultCam);

    // Switch camera when selection changes
    select.addEventListener('change', function() {
        let cam = cameras[this.value];
        if (cam) {
            scanner.start(cam);
        }
    });

}).catch(function (e) {
    console.error(e);
    alert('Error accessing cameras: ' + e);
});
</script>
@endsection
