<!-- Extends the main layout. -->
@extends('layout')

<!-- Sets the title for this view to "Student List". -->
@section('title', 'Student List')

@section('content')
<!-- Header for the student list page. -->
<h1 class="mb-4">Student List</h1>

<!-- Search and filter input fields for searching by name or filtering by age. -->
<div class="row mb-4">
    <div class="col-md-6">
        <input type="text" id="searchName" class="form-control" placeholder="Search by Name">
    </div>
    <div class="col-md-6">
        <input type="number" id="filterAge" class="form-control" placeholder="Filter by Age">
    </div>
</div>

<!-- Table to display the list of students with name, age, and actions. -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="studentTable">
        <!-- Includes a partial view with rows of students, passing the student data. -->
        @include('student_rows', ['students' => $students])
    </tbody>
</table>

<!-- JavaScript to handle AJAX requests for filtering/searching students. -->
<script>
   $(document).ready(function () {
    // Function to fetch filtered or searched students.
    function fetchStudents() {
        $.ajax({
            url: "{{ route('students.index') }}",
            type: "GET",
            // Sends the name and age inputs as query parameters.
            data: {
                name: $('#searchName').val() || undefined,
                age: $('#filterAge').val() || undefined
            },
            success: function (data) {
                // Replaces the table body with new student rows.
                $('#studentTable').html(data);
            }
        });
    }

    // Binds the fetchStudents function to input events on search/filter fields.
    $('#searchName, #filterAge').on('input', fetchStudents);
});
</script>
@endsection
