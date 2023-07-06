<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

use App\Models\Assist;
use App\Models\Day;
use App\Models\Student;
use Illuminate\Http\Request;


class AssistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $assists = Assist::all();

        return view('assist.index', compact('assists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // pasar el día
        //materia dependiendo del día y horario 

        // $currentDate= Carbon::now(); //Fecha de hoy
        // $carbonCD= Carbon::parse($currentDate);

        $error = '';
        return view('assist.create', compact('error'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Registrar asistencia solo si existe dni del Student

        $student = Student::where('dni', $request->dni)->first();
        if ($student) {
            $targetTime = Carbon::now()->format('H:i'); //Hora actual para la asistencia

            $currentDate = Carbon::now();


            $day = Carbon::now()->format('l');
            $day_id = '';
            switch ($day) {
                case 'Monday':

                    $day_id = 2;

                    break;
                case 'Tuesday':

                    $day_id = 3;

                    break;
                case 'Wednesday':

                    $day_id = 4;

                    break;
                case 'Thursday':

                    $day_id = 5;

                    break;
                case 'Friday':

                    $day_id = 6;

                    break;
                case 'Saturday':

                    $day_id = 7;

                    break;
                case 'Sunday':

                    $day_id = 1;

                    break;
            }

            $day = Day::where('id', $day_id)->first();
            $configs = $day->config;

            foreach ($configs as $config) {
                $start = $config->start;
                $stop = $config->stop;
                $finish = $config->finish;



                if ($finish >= $targetTime && $start <= $targetTime) {
                    // El horario actual es posterior al horario ingresado
                    // Agrega aquí tu lógica

                    $assist = Assist::create([
                        'student_id' => $student->id,
                        'subject_id' => $config->subject_id,
                        'day_id' => $config->day_id,
                        'date' => $currentDate,
                        'hour' => $targetTime
                    ]);

                    return redirect()->route('assists.index');
                } else {

                    $error = 'Error al ingrersar la asistencia, se encuentra fuera de horario';

                    return view('assist.create', compact('error'));
                }
            }
        } else {
            $error = 'El dni ingresado no está registrado en la base de datos, por favor ingresar un dni registrado';

            return view('assist.create', compact('error'));
            $error = '';
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
