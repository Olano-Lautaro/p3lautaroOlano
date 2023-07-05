<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function career(): BelongsToMany  
    {
        return $this->belongsToMany(Career::class);
    }

    public function config(): HasMany 
    {
        return $this->hasMany(Config::class);
    }

    public function assist(): HasMany 
    {
        return $this->hasMany(Assist::class);
    }
}
