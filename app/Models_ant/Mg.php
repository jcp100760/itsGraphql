<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matter;
use App\Models\Proffessor;
use App\Models\Group;

class Mg extends Model
{
    use HasFactory;

    protected $table = 'mg';
    public $timestamps = false;

    protected $fillable = [
        'matterId','groupId','proffessorId'
    ];
}
