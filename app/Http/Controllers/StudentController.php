<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    // TODO: show all student data
    // public function index()
    // {
    //     $students = Student::all();
    //     return view(
    //         'student.list',
    //         compact('students')
    //     );
    // }
    public function index()
    {
        return view(
            'student.list',
            [
                'students' => Student::all()
            ]
        );
    }

    // TODO: show student data by id cara biasa
    // public function show($id)
    // {
    //     $student = Student::find($id);
    //     return view('student.show', ['student' => $student])
    // }
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }
    // TODO: show create form
    public function create()
    {
        return view('student.create');
    }

    // TODO: store student data from request to database
    public function store(Request $request)
    {
        // store logic
        // 1. Validate user input
        $validated = [
            'name' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'biodata' => 'required|min:5',
            'gender' => 'required',
            'image' => 'file|image|mimetypes:image/jpg,image/png,image/jpeg'
        ];
        $validated = $request->validate($validated);
        // 2. Check wheter user upload an image
        // 3. if upload, store the image to public storage
        if ($request->file('image')) $validated['image'] = $request->file('image')->store('images', 'public');
        // 4. insert all the data to database
        Student::create($validated);
        return redirect()->route('student.list');
    }

    // TODO: show edit form
    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student]);
    }
    // TODO: update student data with specified id
    public function update(Request $request, Student $student)
    {
        $validated = [
            'name' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'biodata' => 'required|min:5',
            'gender' => 'required',
            'image' => 'file|image|mimetypes:image/jpg,image/png,image/jpeg'
        ];
        $validated = $request->validate($validated);
        if ($request->file('image')) {
            Storage::disk('public')->delete($student->image);
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        $student->update($validated);
        return redirect()->route('student.list');
    }
    // TODO: delete data with specified id
    public function destroy(Student $student)
    {
        if ($student->image)  Storage::disk('public')->delete($student->image);
        $student->delete();
        return  redirect()->route('student.list');
    }
}
