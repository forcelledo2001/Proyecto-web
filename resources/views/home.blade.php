@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-white" style="font-size: 3em;">Opciones</h2>
            <hr class="text-white mb-4" />
            <div class="d-flex justify-content-between my-4">
                <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                    <a href="{{ route('admin.reporte') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Crear Reporte</a>
                </div>
                <div class="card d-flex justify-content-center w-100 bg-info mx-3 py-3">
                    <a href="{{ route('admin.sugerencia.create') }}" style="text-decoration: none; font-weight: 700; font-size: 1.6em;" class="card-title text-white m-auto p-2">Crear Sugerencia</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
