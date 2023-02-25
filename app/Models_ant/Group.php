<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Turn;
use App\Models\Mg;

class Group extends Model
{
    use HasFactory;
    
    protected $table = 'group';
    public $timestamps = false;

    protected $fillable = [
        'grade','name','description','turnId','active',
    ];

    // public function turn(){
    //     return $this->belongsTo(Turn::class, 'turnId', 'id');
    // }

    // public function mgs()
    // {
    //     return $this->hasMany(Mg::class, 'groupId', 'id');
    // }
    
}
