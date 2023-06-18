<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if(!empty($keyword)){
            $students = Student::where('stuname','LIKE', "%$keyword%") ->orWhere('contact', 'LIKE', "%$keyword%") ->latest()->paginate();
        }

        else{
            // $students = Student::latest()->paginate($perPage);
            $students = Student::paginate(5);
        }
        // $student = Student::orderby('created_at')->get();
        return view('student.index',['students'=>$students]);
        // ->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'stuname' => 'required',
        //     'address' => 'required',
        //     // 'contact' => 'required|digits:9'
        // ]);

        $student = new Student;
        $student->stuname = $request->stuname;
        $student->address = $request->address;
        $student->contact = $request->contact;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/'.$imageName);
            Image::make($image)->fit(1024,1024)->save($location);
            $student->image = $imageName;
            $student->save();
        }

        return redirect()->route('student.index')->with('success','Student addes successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student = Student::find($request->hidden_id);
        $student->stuname = $request->stuname;
        $student->address = $request->address;
        $student->contact = $request->contact;
        $student->save();
        return redirect()->route('student.index')->with('success','Student updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $location = public_path('storage/');
        $image = $location . $student->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $student->delete();
        return redirect()->route('student.index')->with('success','Student deleted');
    }
}
