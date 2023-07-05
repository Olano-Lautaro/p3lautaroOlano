<?php

namespace App\Http\Controllers;
use App\Models\Career;
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

        // $subject= Subject::create([
        //     "name"=>$request->name
        // ]);
        
        for ($i=2; $i<7; $i++){
            $checkbox= 'check'.$i;
            $finish= 'finish-'.$i;
            $stop='stop-'.$i;
            $start='start-'.$i;

            $configs=Config::where('day_id', $i)->get();
            dd($configs);
            // if (materia_actual['hora_inicio'] >= materia['hora_inicio'] and
            //     materia_actual['hora_inicio'] < materia['hora_fin']) or \
            //    (materia_actual['hora_fin'] > materia['hora_inicio'] and
            //     materia_actual['hora_fin'] <= materia['hora_fin']):
            if ($configs->isNotEmpity()){

                //si hay configuraciones en el día $i recorre las existentes

                foreach ($configs as $config ){
                    
                    // compara los horarios de la configuración a ingresar
                    if ($config->start <= $start && $config->finish > $start 
                    || $finish > $config->start && $finish <= $config->finish ){
                         
                        // si los horarios de la materia a ingresar no se superpone
                        // con la configuraciones existentes en el día $i agrega la configuración
                        if ($request->$checkbox == true){

                            // agrega materia a la bdd
                            $subject= Subject::create([
                                "name"=>$request->name
                            ]);
                            $id=$subject->id;

                            // agrega configuración a la bdd
                            $config=[Config::create([
                                "subject_id"=>$id,
                                "day_id"=>$i,
                                "start"=>$request->$start,
                                "finish"=>$request->$finish,
                                "stop"=>$request->$stop
                            ])];
                        }    
                    }else{
                        dd('hay una materia ya existente en este horario');
                    };
                }
                    
            }else{
                // agraga materia a la bdd
                $subject= Subject::create([
                    "name"=>$request->name
                ]);
                $id=$subject->id;

                // si no hay ninguna configuración en $i (dia) 
                // agrega las que esten marcadas con el checkbox
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
    
        // Edita cada configuracion    

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
        //agrega una nueva configuración
        
        if ($request->new_config != false){
            $finish= 'finish_new';
            $stop='stop_new';
            $start='start_new';
            $day='day_new';
            $newConfig= Config::create([
                "subject_id"=>$id,
                "day_id"=>$request->$day,
                "start"=>$request->$start,
                "finish"=>$request->$finish,
                "stop"=>$request->$stop
            ]);
        };
       

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

    public function destroyConfig(string $id)
    {
        $config= Config::find($id);
        $config->delete();

        return redirect()->route('subjects.edit');
    }

}
