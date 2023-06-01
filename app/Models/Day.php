<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Day extends Model
{
    use HasFactory;
    protected $fillable = [
        'day'
    ];
 
    public function config(): HasMany 
    {
        return $this->hasMany(Config::Class);
    }

    public function assist(): HasMany 
    {
        return $this->hasMany(Assist::Class);
    }
}
