<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matter;
use App\Models\Mg;

class Proffessor extends Model
{
    use HasFactory;

    protected $table = 'proffessor';
    public $timestamps = false;

    protected $fillable = [
        'name','lastname','ci','active'
    ];

}
