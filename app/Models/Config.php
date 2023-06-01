<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'day_id',
        'start',
        'finish',
        'stop'
    ];

    public function subject(): BelongsTo 
    {
        return $this->belongsTo(Subject::Class);
    }

    public function day(): BelongsTo 
    {
        return $this->belongsTo(Day::Class);
    }
}
