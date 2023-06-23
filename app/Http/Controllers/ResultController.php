<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function printResult($id)
    {
        $student = Student::find($id);
        $subjects = $student->subjects;
        $grades = $student->grades;
        // $subjects = Subject::find($id);
        // $grades = Grade::find($id);

        return view('result.index', compact('student', 'subjects', 'grades'));
        // return view('result/index', [
        //     'students' => $students,
        //     'subjects' => $subjects,
        //     'grades' => $grades
        // ]);

    
    // $students = Student::all(); // Retrieve students from the database
    // $subjects = Subject::all(); // Retrieve subjects from the database
    // $grades = Grade::all(); // Retrieve grades from the database

    // Pass the data to the view using an associative array
    
    }

    // UserController.php
    public function show($id)
    {
        // Retrieve the user data based on the provided $id
        $student = Student::find($id);
        // Return the user data to the view
        return view('result.index', compact('student'));
}


}
