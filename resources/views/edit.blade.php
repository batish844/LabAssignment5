<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('students.update',$student->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$student->name}}" required>
        <input type="number" name="age" value="{{$student->age}}" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>