<?php

namespace App\Traits;

use App\Models\Audit;

use Illuminate\Support\Facades\Auth;


trait Auditable
{
    public function saveAudit($action,$log,$description){
        $user= Auth::user('User');
        
        $audit= new Audit;
        $audit-> action=$action;
        $audit-> log=$log;
        $audit->user_id=$user->id;
        $audit->description=$description;
        
        $audit->save();
    }
}
