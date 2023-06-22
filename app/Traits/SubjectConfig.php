<?php

namespace App\Traits;

use App\Models\Config;

trait subjectConfig
{
    public function addConfig($subject_id, $request){
        
        $subjectConfigs=[];

        array_push($subjectConfigs[
            {Config::create([
                    'subject_id'=>$subject_id,
                    'day_id'=>$request->day,
                    'start'=>$request->start,
                    'finish'=>$request->finish,
                    'stop'=>$request->stop
                ])
                save();
            }
        ]);
    }
}
