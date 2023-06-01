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

        // Relaciona que materias realiza un estudiante
        // $student= Student::find(1);
        // $subject= $student->subject()->attach([1,2,3]);

        
        return view('student.index',Compact('students'));
        
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
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'dni'=>'required',
            'birthday'=>'required',
            'status'=>'required'
        ]);

        $student= Student::create([
            "name"=>$request->name,
            "lastname"=>$request->lastname,
            "dni"=>$request->dni,
            "birthday"=>$request->birthday,
            "status"=>$request->status
        ]);

        $student->saveAudit('A', 'Alta', 'Alumno');

        return redirect()->route('students.index');
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
        $student->birthday=$request->birthday;
        $student->status=$request->status;

        $student->save();
        $student->saveAudit('M','modificación', 'Alumno');
        return redirect()->Route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student= Student::find($id);
        $student->delete();
        $student->saveAudit('B', 'Baja', 'Alumno');
        return redirect()->Route('students.index');
    }
}
