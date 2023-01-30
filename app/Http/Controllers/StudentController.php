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
            'email' => 'required | email',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512'
        ]);

        // dd($request->file());

        $ext_name = $request->file('image')->extension();

        // Generate a unique, random name
        //$img_name = $request->file('image')->hashName();

        // Genarate a custom, unique name
        $img_name = date('YmdHis').'.'.$ext_name;

        $request->file('image')->move(public_path('uploads/'), $img_name);

        //dd($request->input());

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->image = $img_name;
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

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg|max:512'
            ]);

            // if validation is complete then delete the old photo from local server
            $image_path = public_path('uploads/'.$student->image);
            if(file_exists($image_path) && !empty($student->image)){
                unlink($image_path);
            };
            

            $ext_name = $request->file('image')->extension();
            $img_name = date('YmdHis').'.'.$ext_name;

            $request->file('image')->move(public_path('uploads/'), $img_name);

            $student->image = $img_name;

        }

        //dd($request->input());

        $student->name = $request->name;
        $student->email = $request->email;
        $student->update();

        return redirect()->route('home')->with('success', 'Student updated successfully !');
    }

    public function softdelete($id){
        $data = Student::find($id);
        //dd($data);
        $data->delete();
        return redirect()->back()->with('success', 'Student deleted temporarily');
    }

    public function forceDelete($id){
        $data = Student::onlyTrashed()->find($id);
        //dd($data);

        if(file_exists(public_path('uploads/'.$data->image)) && !empty($data->image)){
            unlink(public_path('uploads/'.$data->image));
        }
        //dd($data);
        $data->forceDelete();
        return redirect()->back()->with('success', 'Student deleted permanently');
    }
    public function trash(){
        $trash_data = Student::onlyTrashed()->latest()->get();
        //dd($trash_data);
        return view('trash', compact('trash_data'));
    }
    public function restore($id){
        Student::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('home')->with('success', 'Student restored sucessfully !');
    }
}
