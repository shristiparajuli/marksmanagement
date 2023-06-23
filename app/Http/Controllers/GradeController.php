<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subjects = Subject::pluck('name', 'id');
        // return view('result.index', compact('subjects'));
        //return view('result.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        $students = Student::pluck('stuname', 'id');
        return view('result.create', compact('subjects', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $grade = new Grade;
       $grade->student_id = $request->student_id;
       $grade->subject_id = $request->subject_id;
       $grade->score = $request->score;
       $grade->save();
    
       return redirect()->route('result.create')->with('success','Student addes successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }

    // public function retrieveDataForDropdown()
    // {
    // // Retrieve data from the model
    // $data = Student::all();
    // // Pass the data to the view
    // return $data;
    // }

}
