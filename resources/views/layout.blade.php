<!-- Main layout template for the application. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets character encoding to UTF-8 for broad character support. -->
    <meta charset="UTF-8">
    <!-- Ensures responsive scaling on mobile devices. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sets the title for the page; uses "Student Management" if no title is provided by child views. -->
    <title>@yield('title', 'Student Management')</title>
    <!-- Links Bootstrap CSS from a CDN for styling. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Links jQuery library from a CDN for easy JavaScript manipulation. -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Navbar with primary color theme for navigation. -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Brand link that directs to the student index page. -->
            <a class="navbar-brand" href="{{ route('students.index') }}">Student Management</a>
            <!-- Button to toggle navbar on smaller screens. -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Main content area with margin; child views will insert their content here. -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer with centered text at the bottom of the page. -->
    <footer class="bg-light text-center text-lg-start mt-auto py-3">
        <div class="container">
            © 2024 Student Management
        </div>
    </footer>

    <!-- Bootstrap JavaScript bundle for enabling Bootstrap components' functionality. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
