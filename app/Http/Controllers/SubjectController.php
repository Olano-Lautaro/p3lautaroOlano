<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Config;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects= Subject::all();


        // $student= $subject->student->name;
        // return $student;

        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>'required'
        ]);

        $subject= Subject::create([
            "name"=>$request->name
        ]);

       

        

        $request->validate([
            "day"=>'required',
            "start"=>'required',
            "finish"=>'required',
            "stop"=>'required'
        ]);
        $subjectConfig= Config::create([
            'subject_id'=>$subject->id,
            'day'=>$request->day,
            'start'=>$request->start,
            'finish'=>$request->finish,
            'stop'=>$request->stop
        ]);

        dd($subjectConfig);


        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject= Subject::where('id', $id)->get();

        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject= Subject::find($id);

        $subject->name=$request->name;

        $subject->save();

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject= Subject::find($id);
        $subject->delete();

        return redirect()->route('subjects.index');
    }
}
