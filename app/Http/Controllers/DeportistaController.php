<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deportista;
use App\Models\Equipo;

class DeportistaController extends Controller
{
    public function index(){
        $deportistas = Deportista::paginate(5);
        return view('admin.deportista.index', compact('deportistas'));
    }
    public function create(){
        $equipos = Equipo::all();
        return view('admin.deportista.create', compact('equipos'));
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|integer|min:1',
            'cantidad_goles' => 'required|integer|min:0',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        $id = Equipo::find($request->equipo_id)->id;

        Deportista::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'cantidad_goles' => $request->cantidad_goles,
            'equipo_id' => $id,
        ]);

        return redirect()->route('admin.deportista.index');
    }
    public function show($id){
        $deportista = Deportista::find($id);
        return view('admin.deportista.show', compact('deportista'));
    }
    public function edit($id){
        $deportista = Deportista::find($id);
        $equipos = Equipo::all();
        return view('admin.deportista.edit', compact('deportista', 'equipos'));
    }
    public function update(Request $request, Deportista $deportista){
        $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|integer|min:1',
            'cantidad_goles' => 'required|integer|min:0',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        $deportista->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'cantidad_goles' => $request->cantidad_goles,
            'equipo_id' => $request->equipo_id
        ]);

        return redirect()->route('admin.deportista.index');
    }
    public function destroy($id){
        $deportista = Deportista::find($id);
        $deportista->delete();
        return redirect()->route('admin.deportista.index');
    }
}
