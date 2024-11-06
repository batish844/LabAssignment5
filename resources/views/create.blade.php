<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add new student</h1>
    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <button type="submit">Add new Student</button>
    </form>
</body>
</html>