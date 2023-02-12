<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Turn extends Model
{
    use HasFactory;

    protected $table = 'turn';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}
