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

    public function edit($id){
        $student = Student::where('id', $id)->first();
        //dd($data);
        return view('edit', compact('student'));
    }
    public function update(Request $request, $id){
        $student = Student::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required | email'
        ]);

        //dd($request->input());

        $student->name = $request->name;
        $student->email = $request->email;
        $student->update();

        return redirect()->route('home')->with('success', 'Student updated successfully !');
    }

    public function delete($id){
        $data = Student::find($id);
        //dd($data);
        $data->delete();
        return redirect()->back()->with('success', 'Student deleted successfully');
    }
}
