<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view('students', ['students' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/uploads/' . $fileName);

        Student::create(
            [
                'student_id' => $request->student_id,
                'ism' => $request->ism,
                'familiyasi' => $request->familiyasi,
                'img' => $filePath,
                'file_name' =>  $fileName,
            ]
        );

        return redirect()->route('students.index')->with('success','Student created successfully.');

        }
        // $students = new Student();
        // $students->student_id= $request->input('student_id');
        // $students->ism = $request->input('ism');
        // $students->familiyasi   = $request->input('familiyasi');
        // $students->save();
       
        // return redirect()->route('students.index')->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
        return view('update', compact('student'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
    
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
    
        $request->validate([
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/uploads/', $fileName);
            if ($student->file_name) {
                Storage::delete('public/uploads/' . $student->file_name);
            }
    
            $student->update([
                'file_name' => $fileName,
                'img' =>  $filePath,
                'student_id' => $request->student_id,
                'ism' => $request->ism,
                'familiyasi' => $request->familiyasi,
            ]);
    
            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        } else {
            $student->update([
                'student_id' => $request->student_id,
                'ism' => $request->ism,
                'familiyasi' => $request->familiyasi,
            ]);
                return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
    
        if ($student) {
            
            if ($student->file_name) {
                Storage::delete('public/uploads/' . $student->file_name);
            }
    
            $student->delete();
    
            return redirect()->route('students.index')->with('success', 'Student and associated photo deleted successfully.');
        } else {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        }
    }

}
