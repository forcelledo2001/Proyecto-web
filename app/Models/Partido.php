<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipo_local_id',
        'equipo_local_goles',
        'equipo_visitante_id',
        'equipo_visitante_goles',
        'arbitro_id',
        'fecha',
        'finalizado'
    ];

    public function equipoLocal(){
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante(){
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function arbitro(){
        return $this->belongsTo(Arbitro::class);
    }
}
