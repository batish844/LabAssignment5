@extends('layout')
@section('title','Student List')
@section('content')
<h1>Students List</h1>
    <a href="{{route('students.create')}}">Add New Student</a>
<div class="row mb4">
<div class="col-md-6">
    <input type="text" id="searchName" class="form-control" placeholder="Search by Name">
</div>
<div class="col-md-6">
    <input type="number" id="filterAge" class="form-control" placeholder="Filter by Age">
</div>
</div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
        <th>Age</th>
        <th>Action</th></tr>
    </thead>
    <tbody id="studentTable">
        @include('student_rows',['students'=>$students])
    </tbody>
</table>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 
<script>
    $(document).ready(function(){
        function fetchStudents(){
            let name = $("#searchName").val();
            console.log(name)
            let age = $("#filterAge").val();
            $.ajax({
                url:"{{route('students.index')}}",
                type:"GET",
                data:{
                    name:name ||undefined,
                    age:age ||undefined
                },
                success:function(data){
                    console.log("Hello")
$("#studentTable").html(data);
                }
            })
        }
        $('#searchName, #filterAge').on('input',fetchStudents);
    })
</script>