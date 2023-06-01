<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'duration'
    ];

    public function subject():HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
