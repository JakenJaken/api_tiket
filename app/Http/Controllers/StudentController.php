<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return response()->json($students);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_age' => 'required|numeric',
            'profile_picture' => 'required|image|max:2048',
        ]);

        $student = new Student();
        $student->student_name = $request->input('student_name');
        $student->student_age = $request->input('student_age');

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('public/profiles');
            $student->profile_picture = Storage::url($path);
        }

        $student->save();

        return response()->json($student);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return response()->json($student);
    }


    public function update(Request $request)
    {
        try {
            $request->validate([
                'student_name' => 'nullable',
                'student_age' => 'nullable|numeric',
                'profile_picture' => 'nullable|image|max:2048',
            ]);

            $student = Student::findOrFail($request->input('id'));

            if ($request->hasFile('profile_picture')) {
                // Delete the previous image if it exists
                if ($student->profile_picture) {
                    Storage::delete('public/profiles/' . basename($student->profile_picture));
                }

                $path = $request->file('profile_picture')->store('public/profiles');
                $student->profile_picture = Storage::url($path);
            }

            $student->student_name = $request->input('student_name');
            $student->student_age = $request->input('student_age');

            $student->save();

            return response()->json($student);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        // Delete the associatedimage if it exists
        if ($student->profile_picture) {
            Storage::delete('public/profiles/' . basename($student->profile_picture));
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}