<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('teacher');

        if ($request->has('search')) {
            $query->where('student_name', 'like', '%' . $request->search . '%')
            ->orWhere('class', 'like', '%' . $request->search . '%')
                  ->orWhereHas('teacher', function($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }

        $students = $query->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    public function store(StudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::with('teacher')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    public function update(StudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->validated());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
