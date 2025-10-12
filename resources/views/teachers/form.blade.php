@php $teacher = $teacher ?? null; @endphp

<div class="form-group">
    <label>Full Name</label>
    <input type="text" name="full_name" value="{{ old('full_name', $teacher->full_name ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Contact Number</label>
    <input type="text" name="contact_number" value="{{ old('contact_number', $teacher->contact_number ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $teacher->email ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Expertise</label>
    <input type="text" name="expertise" value="{{ old('expertise', $teacher->expertise ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Branch</label>
    <select name="branch_id" class="form-control" required>
        <option value="">Select Branch</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}"
                {{ old('branch_id', $teacher->branch_id ?? '') == $branch->id ? 'selected' : '' }}>
                {{ $branch->branch_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Photo Path</label>
    <input type="text" name="photo_path" value="{{ old('photo_path', $teacher->photo_path ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ old('status', $teacher->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $teacher->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
