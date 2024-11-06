<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$student->name}} </h1>
    <p>Age: {{$student->age}} </p>
    <a href="{{route('students.index')}}">Back to student List</a>
</body>
</html>