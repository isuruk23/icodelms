<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $institute->name ?? '') }}" class="form-control" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $institute->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $institute->address ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Contact Number</label>
    <input type="text" name="contact_number" value="{{ old('contact_number', $institute->contact_number ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $institute->email ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Website</label>
    <input type="text" name="website" value="{{ old('website', $institute->website ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Logo Path</label>
    <input type="text" name="logo_path" value="{{ old('logo_path', $institute->logo_path ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $institute->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $institute->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
