<?php

namespace App\Http\Controllers;
use App\Models\Career;
use App\Models\Subject;
use App\Models\Config;
use App\Models\Day;
use Illuminate\Http\Request;


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

        $subject= Subject::create([
            "name"=>$request->name
        ]);

        $id=$subject->id;

        $configs=[];

        for ($i=2; $i<7; $i++){
            $checkbox= 'check'.$i;
            $finish= 'finish-'.$i;
            $stop='stop-'.$i;
            $start='start-'.$i;
        
            if ($request->$checkbox == true){
                $config=[Config::create([
                    "subject_id"=>$id,
                    "day_id"=>$i,
                    "start"=>$request->$start,
                    "finish"=>$request->$finish,
                    "stop"=>$request->$stop
                ])];
            }
        }


        // $configs= Config::where('subject_id',$id)->get();


        



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
        $subject= Subject::find( $id);
        $configs= $subject->config;
       
        // $days=[];
        // foreach ($configs as $value) {
        //     $days[]=$value->day_id;
        // }
        
       // $dias= Day::select("*")->wherein('id', $days)->get();

       

        // for ($i=0; $i <= $count; $i++) { 
        //     $day= Day::where('id', $configs[$i]->day_id)->get();
        //     array_push($days, $day);
        // };

        return view('subject.edit', compact('subject', 'configs'));
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
        $configs= $subject->config;
        // dd($configs);
        
        foreach ($configs as $key=> $config) {

            $finish= 'finish-'.$key;
            $stop='stop-'.$key;
            $start='start-'.$key;
            $day='day-'.$key;
            
            $config->day_id=$request->$day;
            $config->start=$request->$start;
            $config->finish=$request->$finish;
            $config->stop=$request->$stop;

            $config->save();
        }
        if ($request->new_config != false){
            $newConfig= Config::create([
                "subject_id"=>$id,
                "day_id"=>$request->day_new,
                "start"=>$request->start_new,
                "finish"=>$request->finish_new,
                "stop"=>$request->stop_new
            ]);

        };
       

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
