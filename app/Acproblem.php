<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acproblem extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function ruangans(){
        return $this->belongsTo(Ruangan::class,'id_ruangans','id');
    }
}
