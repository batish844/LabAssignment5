<!-- Extends the main layout. -->
@extends('layout')

<!-- Sets the title for this view to "Add New Student". -->
@section('title', 'Add New Student')

@section('content')
<!-- Header for the create form page. -->
<h1 class="mb-4">Add New Student</h1>

<!-- Form for creating a new student record, sends a POST request to the store route. -->
<form action="{{ route('students.store') }}" method="POST" class="mb-4">
    <!-- CSRF token for security. -->
    @csrf
    <div class="mb-3">
        <!-- Label and input field for the new student's name. -->
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <!-- Label and input field for the new student's age. -->
        <label for="age" class="form-label">Age</label>
        <input type="number" id="age" name="age" class="form-control" required>
    </div>
    <!-- Submit button to create the new student. -->
    <button type="submit" class="btn btn-primary">Add Student</button>
</form>
@endsection
