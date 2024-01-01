<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakLanjutSarana extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tindak_lanjut_saranas';

    public function ruangans(){
        return $this->belongsTo(Ruangan::class,'id_ruangans','id');
    }
}
