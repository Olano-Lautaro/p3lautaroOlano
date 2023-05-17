<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'birthdate',
        'status'
    ];

     /**
     * Get all of the comments for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    } 
}
