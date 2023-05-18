<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use App\Traits\Auditable;

class StudentController extends Controller
{
    // use Auditable;
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $students= Student::all();
        // $subjects= Student::find()->subject->name;
        // dd($subjects);
        return view('student.index',Compact('students'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $student= Student::where('id',$id)->get();
        
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $student = Student::find($id);

        $student->name=$request->name;
        $student->lastname=$request->lastname;
        $student->dni=$request->dni;
        $student->birthdate=$request->birthdate;
        $student->status=$request->status;

        $student->save();
        $student->saveAudit('M','modificación');
        return redirect()->Route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
