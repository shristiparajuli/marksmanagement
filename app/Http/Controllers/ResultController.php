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
        $sum = Grade::where('student_id', $id)->sum('score');
        $average = round(Grade::where('student_id', $id)->avg('score'), 2);
        return view('result.index', compact('student', 'subjects', 'grades', 'sum', 'average'));
    }

    // UserController.php
    public function show($id)
    {
        $student = Student::find($id);
        $grades = Grade::where('student_id', $id)->get();
        return view('result.index', compact('student','grades'));
    }

}
