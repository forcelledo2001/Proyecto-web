<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'victorias',
        'empates',
        'derrotas',
        'puntos',
    ];

    public function deportistas(){
        return $this->hasMany(Deportista::class);
    }

    public function partidos(){
        return $this->hasMany(Partido::class, 'equipo_local_id')->orWhere('equipo_visitante_id', $this->id);
    }

    public static function getPuntosEquipo($victorias, $empates){
        return ($victorias*3)+$empates;
    }
}
