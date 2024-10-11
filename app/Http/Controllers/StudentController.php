<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50', 
            'email' => 'required|email', 
            'age' => 'required|integer|min:1|max:100',
        ]);

        $newStudent = Students::create($data);

        return redirect()->route('student.create')->with('success', 'Student created successfully!');
    }
}
