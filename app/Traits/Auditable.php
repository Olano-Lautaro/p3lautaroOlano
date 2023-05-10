<?php

namespace App\Traits;

use App\Models\Audit;


trait Auditable
{
    public function cambiosGuardados($action,$log,$user_id){
        $audit= new Audit;
        $audit-> action=$action;
        $audit-> log=$log;
        $audit->user_id=$user_id;
        
        $audit->save();
    }
}
