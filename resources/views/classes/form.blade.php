@php $class = $class ?? null; @endphp

<div class="form-group">
    <label>Class Code</label>
    <input type="text" name="class_code" value="{{ old('class_code', $class->class_code ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Class Name</label>
    <input type="text" name="class_name" value="{{ old('class_name', $class->class_name ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Course</label>
    <select name="course_id" class="form-control" required>
        <option value="">Select Course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}"
                {{ old('course_id', $class->course_id ?? '') == $course->id ? 'selected' : '' }}>
                {{ $course->course_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Teacher</label>
    <select name="teacher_id" class="form-control" required>
        <option value="">Select Teacher</option>
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}"
                {{ old('teacher_id', $class->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->full_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Branch</label>
    <select name="branch_id" class="form-control" required>
        <option value="">Select Branch</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}"
                {{ old('branch_id', $class->branch_id ?? '') == $branch->id ? 'selected' : '' }}>
                {{ $branch->branch_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Start Date</label>
    <input type="date" name="start_date" value="{{ old('start_date', $class->start_date ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>End Date</label>
    <input type="date" name="end_date" value="{{ old('end_date', $class->end_date ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Schedule</label>
    <input type="text" name="schedule" value="{{ old('schedule', $class->schedule ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Location</label>
    <input type="text" name="location" value="{{ old('location', $class->location ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ old('status', $class->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $class->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
