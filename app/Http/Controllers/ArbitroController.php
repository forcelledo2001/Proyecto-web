<?php

namespace App\Http\Controllers;

use App\Models\Arbitro;
use Illuminate\Http\Request;

class ArbitroController extends Controller
{
    public function index(){
        $arbitros = Arbitro::paginate(5);
        return view('admin.arbitro.index', compact('arbitros'));
    }
    public function create(){
        $arbitros = Arbitro::all();
        return view('admin.arbitro.create', compact('arbitros'));
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
        ]);

        Arbitro::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('admin.arbitro.index');
    }
    public function show($id){
        $arbitro = Arbitro::find($id);
        return view('admin.arbitro.show', compact('arbitro'));
    }
    public function edit($id){
        $arbitro = Arbitro::find($id);
        return view('admin.arbitro.edit', compact('arbitro'));
    }
    public function update(Request $request, Arbitro $arbitro){
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $arbitro->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('admin.arbitro.index');
    }
    public function destroy($id){
        $arbitro = Arbitro::find($id);
        $arbitro->delete();
        return redirect()->route('admin.arbitro.index');
    }
}
