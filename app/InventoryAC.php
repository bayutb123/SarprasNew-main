<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryAC extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ruangans',
        'status',
        'type',
        'pk',
        'production_year',
        'bought_year',
        'author',
    ];

    protected $table = 'inventory_ac';

    protected $casts = [
        'production_year' => 'date',
        'bought_year' => 'date',
    ];

    public function ruangans(){
        return $this->belongsTo(Ruangan::class,'id_ruangans','id');
    }
}
