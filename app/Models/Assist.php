<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assist extends Model
{
    use HasFactory;
    protected $fillable =[
        'student_id',
        'subject_id',
        'day_id',
        'date',
        'hour'
    ];

    public function day(): BelongsTo 
    {
        return $this->belongsTo(Day::class);
    }

    public function student(): BelongsTo  
    {
        return $this->belongsTo(Student::class);
    }

    public function subject(): BelongsTo 
    {
        return $this->belongsTo(Subject::class);
    }
}
