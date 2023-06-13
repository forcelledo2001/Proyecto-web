@extends('layouts.app')
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-white" style="font-size: 3em;">Opciones</h2>
            <hr class="text-white mb-4" />
            <div class="d-flex flex-column p-3">
                <div class="d-flex justify-content-between my-4">
                    <div class="card d-flex justify-content-center bg-info w-100 mx-3 py-3">
                        <a href="{{ route('admin.user.index') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Gestionar Usuario</a>
                    </div>
                    <div class="card d-flex justify-content-center bg-info w-100 mx-3 py-3">
                        <a href="{{ route('admin.deportista.index') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Gestionar Deportista</a>
                    </div>
                    <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                        <a href="{{ route('admin.arbitro.index') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Gestionar Arbitro</a>
                    </div>
                </div>
                <div class="d-flex justify-content-between my-4">
                    <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                        <a href="{{ route('admin.partido.index') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Gestionar Partido</a>
                    </div>
                    <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                        <a href="{{ route('admin.equipo.index') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Gestionar Equipo</a>
                    </div>
                    <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                        <a href="{{ route('admin.reporte') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Crear Reporte</a>
                    </div>
                </div>
                <div class="d-flex col-4 justify-content-between my-4">
                    <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                        <a href="{{ route('admin.sugerencia.index') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Gestionar Sugerencias</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
