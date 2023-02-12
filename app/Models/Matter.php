<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Proffessor;
use App\Models\Mg;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matter extends Model
{
    use HasFactory;

    protected $table = 'matter';
    public $timestamps = false;

    protected $fillable = [
        'name', 'description',
    ];
}
