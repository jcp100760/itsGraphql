<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gmp extends Model
{
    use HasFactory;
    
    protected $table = 'gmp';
    public $timestamps = false;

    protected $fillable = [
        'mgId', 'proffessorId', 'active',
    ];
    
}
