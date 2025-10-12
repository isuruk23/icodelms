@php $branch = $branch ?? null; @endphp

<div class="form-group">
    <label>Institute</label>
    <select name="institute_id" class="form-control" required>
        <option value="">Select Institute</option>
        @foreach($institutes as $institute)
            <option value="{{ $institute->id }}"
                {{ old('institute_id', $branch->institute_id ?? '') == $institute->id ? 'selected' : '' }}>
                {{ $institute->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Branch Code</label>
    <input type="text" name="branch_code" value="{{ old('branch_code', $branch->branch_code ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Branch Name</label>
    <input type="text" name="branch_name" value="{{ old('branch_name', $branch->branch_name ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $branch->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Contact Number</label>
    <input type="text" name="contact_number" value="{{ old('contact_number', $branch->contact_number ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $branch->email ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Manager Name</label>
    <input type="text" name="manager_name" value="{{ old('manager_name', $branch->manager_name ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ old('status', $branch->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $branch->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
