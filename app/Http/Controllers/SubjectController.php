<?php

namespace App\Http\Controllers;
use App\Models\Career;
use App\Models\Subject;
use App\Models\Config;
use App\Models\Day;
use Illuminate\Http\Request;

use App\Traits\SubjectConfig;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $subjects= Subject::all();

        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $careers= Career::all();
        
        return view('subject.create', compact('careers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required'
        ]);

        $request->validate([
            "day"=>'required',
            "start"=>'required',
            "finish"=>'required',
            "stop"=>'required'
        ]);


        $subject= Subject::create([
            "name"=>$request->name
        ]);

        $id=$subject->id;
        $data= $request;

        $subject->addConfig($id,$data);

        // $subjectConfigs= [ Config::create([
        //     'subject_id'=>$subject->id,
        //     'day_id'=>$request->day,
        //     'start'=>$request->start,
        //     'finish'=>$request->finish,
        //     'stop'=>$request->stop
        // ]) ];


        $career= Career::find($request->career);//Busca a que carrera va apertenecer la materia.
        
        $subjects= $career->subject()->attach($id);//relaciona una materia con una carrera. 
 
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
        $config= Config::where('subject_id', $id)->get();
        
        $day= Day::where('id', $config[0]->day_id)->get(); 
        
        return view('subject.edit', compact('subject', 'config', 'day'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Edit Materias   
        $subject= Subject::find($id);
        $subject->name=$request->name;
        $subject->save();

        // Edit Config Materias
        $config= Config::where('subject_id', $id)->get();
        $config->day_id=$request->day;
        $config->start=$request->start;
        $config->finish=$request->finish;
        $config->stop=$request->stop;
        $config->save();

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $config= Config::where('subject_id', $id)->get();
        // $config->delete();

        $subject= Subject::find($id);
        $subject->delete();
    
        return redirect()->route('subjects.index');
    }

    public function infoConfig($id)
    {
        $config= Config::where($id = 'subject_id');

        dd($config);
    }
}
