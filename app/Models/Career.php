<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function subject():BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
}
