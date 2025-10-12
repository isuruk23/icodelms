@php $course = $course ?? null; @endphp

<div class="form-group">
    <label>Course Code</label>
    <input type="text" name="course_code" value="{{ old('course_code', $course->course_code ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Course Name</label>
    <input type="text" name="course_name" value="{{ old('course_name', $course->course_name ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $course->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Duration (Weeks)</label>
    <input type="number" name="duration_weeks" value="{{ old('duration_weeks', $course->duration_weeks ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Fee (LKR)</label>
    <input type="number" step="0.01" name="fee" value="{{ old('fee', $course->fee ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ old('status', $course->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $course->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
