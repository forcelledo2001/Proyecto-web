<?php

namespace App\Http\Controllers;

use App\Models\Arbitro;
use App\Models\Equipo;
use App\Models\Partido;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index(){
        $partidos = Partido::paginate(5);
        return view('admin.partido.index', compact('partidos'));
    }

    public function create(){
        $arbitros = Arbitro::all();
        $equipos = Equipo::all();
        return view('admin.partido.create', compact('arbitros', 'equipos'));
    }

    public function store(Request $request){
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'arbitro_id' => 'required|exists:arbitros,id',
            'equipo_local_goles' => 'nullable|integer|min:0|required_with:equipo_visitante_goles',
            'equipo_visitante_goles' => 'nullable|integer|min:0|required_with:equipo_local_goles',
            'fecha' => 'required|date'
        ]);

        $fechaActual = Carbon::now();
        $fecha = Carbon::parse($request->fecha);
        if($fecha->isBefore($fechaActual)){
            return redirect()->route('admin.partido.create')->with('message', 'Error en la fecha');
        }

        if($request->equipo_local_goles || $request->equipo_visitante_goles){
            $finalizado = true;
        }else{
            $finalizado = false;
        }

        $partido = Partido::create([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'arbitro_id' => $request->arbitro_id,
            'equipo_local_goles' => $request->equipo_local_goles,
            'equipo_visitante_goles' => $request->equipo_visitante_goles,
            'fecha' => $fecha,
            'finalizado' => $finalizado
        ]);

        $partido->equipoLocal()->update([
            'puntos' => Equipo::getPuntosEquipo($partido->equipoLocal->victorias, $partido->equipoLocal->empates)
        ]);
        $partido->equipoVisitante()->update([
            'puntos' => Equipo::getPuntosEquipo($partido->equipoVisitante->victorias, $partido->equipoVisitante->empates)
        ]);

        return redirect()->route('admin.partido.index');
    }
    public function show($id){
        $partido = Partido::find($id);

        $fechaActual = Carbon::now();
        $fecha = Carbon::parse($partido->fecha);
        if($fecha->isBefore($fechaActual) || $fecha->eq($fechaActual)){
            $partido->update([
                'finalizado' => true
            ]);
        }
        return view('admin.partido.show', compact('partido'));
    }
    public function edit($id){
        $partido = Partido::find($id);
        $arbitros = Arbitro::all();
        $equipos = Equipo::all();
        return view('admin.partido.edit', compact('partido', 'arbitros', 'equipos'));
    }
    public function update(Request $request, Partido $partido){
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'arbitro_id' => 'required|exists:arbitros,id',
            'equipo_local_goles' => 'nullable|integer|min:0|required_with:equipo_visitante_goles',
            'equipo_visitante_goles' => 'nullable|integer|min:0|required_with:equipo_local_goles',
            'fecha' => 'required|date'
        ]);


        $fechaActual = Carbon::now();
        $fecha = Carbon::parse($request->fecha);
        if($fecha->isBefore($fechaActual)){
            return redirect()->route('admin.partido.create')->with('message', 'Error en la fecha');
        }

        if($request->equipo_local_goles || $request->equipo_visitante_goles){
            $finalizado = true;
        }else{
            $finalizado = false;
        }

        $partido->update([
            'equipo_local_id' => $request->equipo_local_id,
            'equipo_visitante_id' => $request->equipo_visitante_id,
            'arbitro_id' => $request->arbitro_id,
            'equipo_local_goles' => $request->equipo_local_goles,
            'equipo_visitante_goles' => $request->equipo_visitante_goles,
            'fecha' => $fecha,
            'finalizado' => $finalizado
        ]);

        $partido->equipoLocal()->update([
            'puntos' => Equipo::getPuntosEquipo($partido->equipoLocal->victorias, $partido->equipoLocal->empates)
        ]);
        $partido->equipoVisitante()->update([
            'puntos' => Equipo::getPuntosEquipo($partido->equipoLocal->victorias, $partido->equipoLocal->empates)
        ]);

        return redirect()->route('admin.partido.index');
    }
    public function destroy($id){
        $partido = Partido::find($id);
        $partido->delete();
        return redirect()->route('admin.partido.index');
    }
}
