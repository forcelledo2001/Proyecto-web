<?php

namespace App\Http\Controllers;

use App\Models\Sugerencia;
use App\Models\User;
use Illuminate\Http\Request;

class SugerenciaController extends Controller
{
    public function index(){
        $sugerencias = Sugerencia::paginate(5);
        return view('admin.sugerencia.index', compact('sugerencias'));
    }
    public function create(){
        return view('admin.sugerencia.create');
    }
    public function store(Request $request){
        $request->validate([
            'contenido' => 'required|string',
            'correo' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->correo)->first();

        Sugerencia::create([
            'contenido' => $request->contenido,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.sugerencia.index');
    }
    public function show($id){
        $sugerencia = Sugerencia::find($id);
        return view('admin.sugerencia.show', compact('sugerencia'));
    }
    public function destroy($id){
        $sugerencia = Sugerencia::find($id);
        $sugerencia->delete();
        return redirect()->route('admin.sugerencia.index');
    }
}
