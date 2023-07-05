<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'student_name' => $request->student_name,
        ]);

        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->update([
                'student_name' => $request->student_name,
            ]);
            return response()->json($student);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update student'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return response()->json(['message' => 'Student deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete student'], 500);
        }
    }
}