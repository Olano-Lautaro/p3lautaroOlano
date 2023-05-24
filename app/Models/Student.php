<?php

namespace App\Models;

use App\traits\Auditable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use Auditable; 
    
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'birthdate',
        'status'
    ];

   
    public function subject(): BelongsToMany
    {
        return $this->BelongsToMany(Subject::class);
    } 
}
