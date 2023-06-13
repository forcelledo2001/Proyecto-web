<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'edad',
        'cantidad_goles',
        'equipo_id',
    ];

    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
}
