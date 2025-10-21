@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<h1>Scan Student QR for Attendance</h1>

<video id="preview" width="100%" height="400" style="border:1px solid #ccc; border-radius:8px;"></video>

<form id="attendanceForm" method="POST" action="{{ route('attendance.store') }}">
    @csrf
    <input type="hidden" name="student_code" id="student_code">
    <input type="hidden" name="class_id" value="{{ $class_id }}"> 
</form>


{{-- Payment Modal --}}
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="paymentModalLabel">Payment Required</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">This student has not completed payment for this month.</p>
        <form id="paymentForm">
          @csrf
          <input type="hidden" name="student_id" id="modal_student_id">
          <input type="hidden" name="class_id" id="modal_class_id" value="{{ $class_id }}">
          <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Payment Method</label>
            <select name="method" class="form-control" required>
              <option value="cash">Cash</option>
              <option value="card">Card</option>
              <option value="online">Online</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success w-100">Submit Payment</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection



@section('script')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<!-- <script>
let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

scanner.addListener('scan', function (content) {
    document.getElementById('student_code').value = content;
    document.getElementById('attendanceForm').submit();
});

Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        // Try to find the back camera
        let backCam = cameras.find(cam => cam.name.toLowerCase().includes('back')) || cameras[0];
        scanner.start(backCam);
    } else {
        alert('No cameras found.');
    }
}).catch(function (e) {
    console.error(e);
    alert('Error accessing camera: ' + e);
});
</script> -->
<script>
let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
let alertBox = document.getElementById('alertBox');

scanner.addListener('scan', function (student_code) {
    markAttendance(student_code);
   
});

function showAlert(type, message) {
    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;
    alertBox.classList.remove('d-none');
    setTimeout(() => alertBox.classList.add('d-none'), 4000);
}



function markAttendance(student_code) {
    alert(student_code);

 
}




// Handle payment submission
document.getElementById('paymentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    fetch('{{ route('payments.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            showAlert('success', 'Payment received. You can scan again now.');
            bootstrap.Modal.getInstance(document.getElementById('paymentModal')).hide();
        } else {
            showAlert('danger', data.message);
        }
    })
    .catch(err => console.error(err));
});

// Start camera (back cam default)
Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        let backCam = cameras.find(cam => cam.name.toLowerCase().includes('back')) || cameras[0];
        scanner.start(backCam);
    } else {
        alert('No cameras found.');
    }
}).catch(function (e) {
    console.error(e);
});
</script>
@endsection
