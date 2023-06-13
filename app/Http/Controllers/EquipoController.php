<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index(){
        $equipos = Equipo::paginate(5);
        return view('admin.equipo.index', compact('equipos'));
    }
    public function create(){
        return view('admin.equipo.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'victorias' => 'nullable|integer|min:0',
            'empates' => 'nullable|integer|min:0',
            'derrotas' => 'nullable|integer|min:0',
        ]);

        $victorias = $request->victorias ? $request->victorias : 0;
        $empates = $request->empates ? $request->empates : 0;
        $derrotas = $request->derrotas ? $request->derrotas : 0;

        Equipo::create([
            'nombre' => $request->nombre,
            'victorias' => $victorias,
            'empates' => $empates,
            'derrotas' => $derrotas,
            'puntos' => Equipo::getPuntosEquipo($victorias, $empates)
        ]);

        return redirect()->route('admin.equipo.index');
    }

    public function show(Equipo $equipo){
        return view('admin.equipo.show', compact('equipo'));
    }

    public function edit(Equipo $equipo){
        return view('admin.equipo.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo){
        $request->validate([
            'nombre' => 'required',
            'victorias' => 'nullable|integer|min:0',
            'empates' => 'nullable|integer|min:0',
            'derrotas' => 'nullable|integer|min:0',
        ]);

        $victorias = $request->victorias ? $request->victorias : 0;
        $empates = $request->empates ? $request->empates : 0;
        $derrotas = $request->derrotas ? $request->derrotas : 0;

        $equipo->update([
            'nombre' => $request->nombre,
            'victorias' => $victorias,
            'empates' => $empates,
            'derrotas' => $derrotas,
            'puntos' => Equipo::getPuntosEquipo($victorias, $empates)
        ]);

        return redirect()->route('admin.equipo.index');
    }

    public function destroy(Equipo $equipo){
        $equipo->delete();
        return redirect()->route('admin.equipo.index');
    }
}
