<?php

namespace App\Traits;

use App\Models\Audit;

use Illuminate\Support\Facades\Auth;


trait Auditable
{
    public function saveAudit($action,$log,){
        $audit= new Audit;
        $user= Auth::user('User');
        $audit-> action=$action;
        $audit-> log=$log;
        $audit->user_id=$user->id;
        
        $audit->save();
    }
}
