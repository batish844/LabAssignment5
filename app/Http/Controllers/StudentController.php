<?php

// Defines the namespace for the controller, which is part of the App\Http\Controllers directory structure.
namespace App\Http\Controllers;

// Imports the Student model to interact with the students table in the database.
use App\Models\Student;

// Imports the Request class for handling HTTP requests.
use Illuminate\Http\Request;

// Imports the Log facade for logging information, useful for debugging and monitoring.
use Illuminate\Support\Facades\Log;

// Defines the StudentController class, extending the base Controller class.
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Method to display a list of students, with optional filtering.
    public function index(Request $request)
    {
        // Starts a new query on the Student model to retrieve students.
        $query = Student::query();

        // Checks if the request is an AJAX call.
        if ($request->ajax()) {
            // If the request has a 'name' parameter, filter students by name using a "like" query.
            if ($request->has('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            // If the request has an 'age' parameter and it's not empty, filter students by exact age.
            if ($request->has('age') && $request->age !== '') {
                $query->where('age', $request->age);
            }

            // Logs the SQL query being executed and its parameters for debugging.
            Log::info('Query being executed: ', ['query' => $query->toSql(), 'bindings' => $query->getBindings()]);

            // Executes the query to get the filtered students.
            $students = $query->get();

            // Logs the list of students retrieved from the query.
            Log::info('Students retrieved: ', ['students' => $students]);

            // Returns a view containing the student rows, rendering it for the AJAX request.
            return view('student_rows', compact('students'))->render();
        }

        // If not an AJAX request, retrieve all students without filters.
        $students = Student::all();
        
        // Returns the main index view for students, passing the list of students to it.
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Method to display a form for creating a new student.
    public function create()
    {
        // Returns the view for the student creation form.
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method to handle storing a new student record in the database.
    public function store(Request $request)
    {
        // Validates the incoming request, requiring a name (string, max 50 characters) and age (integer, min 1).
        $request->validate([
            'name' => 'required|string|max:50',
            'age' => 'required|integer|min:1'
        ]);

        // Creates a new student record in the database with the provided name and age.
        Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        // Redirects to the student index page with a success message.
        return redirect()->route('index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    // Method to display a single student based on their ID.
    public function show(string $id)
    {
        // Finds the student by ID or throws a 404 error if not found.
        $student = Student::findOrFail($id);

        // Returns the view for displaying a single student's details, passing the student data.
        return view('show', compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Method to show a form for editing an existing student.
    public function edit(string $id)
    {
        // Finds the student by ID or throws a 404 error if not found.
        $student = Student::findOrFail($id);

        // Returns the view for editing a student, passing the student data.
        return view('edit', compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    // Method to handle updating an existing student record in the database.
    public function update(Request $request, string $id)
    {
        // Validates the incoming request for the updated name and age.
        $request->validate([
            'name' => 'required|string|max:50',
            'age' => 'required|integer|min:1'
        ]);

        // Finds the student by ID or throws a 404 error if not found.
        $student = Student::findOrFail($id);

        // Updates the student's name and age with the provided values.
        $student->update([
            'name' => $request->name,
            'age' => $request->age
        ]);

        // Redirects to the student index page with a success message indicating the update.
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Method to delete a student record from the database.
    public function destroy(string $id)
    {
        // Finds the student by ID or throws a 404 error if not found.
        $student = Student::findOrFail($id);

        // Deletes the student record from the database.
        $student->delete();

        // Redirects to the student index page with a success message indicating deletion.
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}