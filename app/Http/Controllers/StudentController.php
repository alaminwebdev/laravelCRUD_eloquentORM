<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $all_students = Student::get();

        return view('welcome', compact('all_students'));

    }
    public function store(Request $request){

        // Doc -> Validation Quickstart -> Writing The Validation Logic

        $request->validate([
            'name' => 'required',
            'email' => 'required | email'
        ]);

        //dd($request->input());

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('home')->with('success', 'Student added successfully !');
    }
}
