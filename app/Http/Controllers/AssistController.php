<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;

use App\Models\Assist;
use App\Models\Day;
use App\Models\Student;
use App\Models\Subject;
use DateTime;
use Illuminate\Http\Request;
use Pest\Arch\ValueObjects\Targets;

class AssistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $assists= Assist::all();

        return view('assist.index', compact('assists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        // pasar el día
        //materia dependiendo del día y horario 

        $currentDate= Carbon::now(); //Fecha de hoy
        $carbonCD= Carbon::parse($currentDate);

        // if ($currentDate->greaterThan($carbonCD)) {
        //     // La fecha actual es posterior a la fecha B
        //     // Agrega aquí tu lógica
        // } elseif ($currentDate->equalTo($carbonCD)) {
        //     // La fecha actual es igual a la fecha B
        //     // Agrega aquí tu lógica
        // } else {
        //     // La fecha actual es anterior a la fecha B
        //     // Agrega aquí tu lógica
        // }

        $error='';



        return view('assist.create', compact('error'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Registrar asistencia solo si existe dni del Student
        
        $student= Student::where('dni', $request->dni)->first();
        if ($student) {
            $targetTime='16:20:00'; 
            //Carbon::now()->format('H:i'); //Hora actual para la asistencia
            
            $currentDate= Carbon::now();

            
            $day= Carbon::now()->format('l');
            $day_id='';
            switch ($day) {
                case 'Monday':
                    // Lógica para el día lunes
                    $day_id= 2;
                    // dd('Lunes');
                    break;
                case 'Tuesday':
                    // Lógica para el día martes
                    $day_id= 3;
                    // dd('Martes');
                    break;
                case 'Wednesday':
                    // Lógica para el día miércoles
                    $day_id= 4;
                    // dd('Miercoles');
                    break;
                case 'Thursday':
                    // Lógica para el día jueves
                    $day_id= 5;
                    // dd('Jueves');
                    break;
                case 'Friday':
                    // Lógica para el día viernes
                    $day_id= 6;
                    // dd('Viernes');
                    break;
                case 'Saturday':
                    // Lógica para el día sábado
                    $day_id= 7;
                    // dd('Sábado');
                    break;
                case 'Sunday':
                    // Lógica para el día domingo
                    $day_id= 1;
                    // dd('Domingo');
                    break;
            }

            $day= Day::where('id', $day_id)->first();
            $configs= $day->config;
             
            foreach ($configs as $config) {
                $start= $config->start;
                $stop= $config->stop;
                $finish= $config->finish;

                // dd($start, $stop, $finish);
                
                //     if ($finish > $targetTime && $start<= $targetTime) {
                //         // El horario actual es posterior al horario ingresado
                //         // Agrega aquí tu lógica
                //    } elseif ($currentTime == $targetTime) {
                //        // El horario actual es igual al horario ingresado
                //        //     // Agrega aquí tu lógica
    
                //    } else {
                //        // El horario actual es anterior al horario ingresado
                //        // Agrega aquí tu lógica
                //    }

                
                if ($finish >= $targetTime && $start<= $targetTime) {
                    // El horario actual es posterior al horario ingresado
                    // Agrega aquí tu lógica
                    
                    $assist= Assist::create([
                        'student_id'=>$student->id,
                        'subject_id'=>$config->subject_id,
                        'day_id'=>$config->day_id,
                        'date'=>$currentDate,
                        'hour'=>$targetTime
                    ]);

                    return redirect()->route('assists.index');

                } else {

                    // El horario actual es igual al horario ingresado
                    //     // Agrega aquí tu lógica
                    
                    dd('fuera de horario');
    
                }
            }
            
        } else {
            $error= 'El dni ingresado no está registrado en la base de datos, por favor ingresar un dni registrado';
                                                
            return view('assist.create', compact('error'));
            $error='';
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Assist $assist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assist $assist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assist $assist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assist $assist)
    {
        //
    }
}
