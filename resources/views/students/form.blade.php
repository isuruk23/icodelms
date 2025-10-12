@php $student = $student ?? null; @endphp

<div class="form-group">
    <label>Student Code</label>
    <input type="text" name="student_code" value="{{ old('student_code', $student->student_code ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Full Name</label>
    <input type="text" name="full_name" value="{{ old('full_name', $student->full_name ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>NIC / Passport</label>
    <input type="text" name="nic_passport" value="{{ old('nic_passport', $student->nic_passport ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Date of Birth</label>
    <input type="date" name="dob" value="{{ old('dob', $student->dob ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Gender</label>
    <select name="gender" class="form-control">
        <option value="">Select</option>
        @foreach(['Male', 'Female', 'Other'] as $gender)
            <option value="{{ $gender }}" {{ old('gender', $student->gender ?? '') == $gender ? 'selected' : '' }}>
                {{ $gender }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Contact Number</label>
    <input type="text" name="contact_number" value="{{ old('contact_number', $student->contact_number ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $student->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Guardian Name</label>
    <input type="text" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Guardian Contact</label>
    <input type="text" name="guardian_contact" value="{{ old('guardian_contact', $student->guardian_contact ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Branch</label>
    <select name="branch_id" class="form-control" required>
        <option value="">Select Branch</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}"
                {{ old('branch_id', $student->branch_id ?? '') == $branch->id ? 'selected' : '' }}>
                {{ $branch->branch_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Student Photo</label>
    <input type="file" name="photo_path" class="form-control">
    @if(isset($student) && $student->photo_path)
        <img src="{{ asset('storage/' . $student->photo_path) }}" alt="Photo" width="80" class="mt-2">
    @endif
</div>

<div class="form-group">
    <label>Barcode Image</label>
    <input type="file" name="barcode_image_path" class="form-control">
    @if(isset($student) && $student->barcode_image_path)
        <img src="{{ asset('storage/' . $student->barcode_image_path) }}" alt="Barcode" width="80" class="mt-2">
    @endif
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ old('status', $student->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $student->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
