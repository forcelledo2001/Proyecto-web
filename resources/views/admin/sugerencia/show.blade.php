@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <a href="{{ route('admin.sugerencia.index') }}">Inicio</a>
                    <span> / </span>
                    <a href="{{ route('admin.sugerencia.show', $sugerencia->id) }}">Sugerencia #{{ $sugerencia->id }}</a>
                </div>

                <h2 class="text-black">Sugerencia #{{ $sugerencia->id }}</h2>
                <hr class="text-black" />

                <div class="card">
                    <div class="card-body">
                        <p>Contenido:</p>
                        <p>{{ $sugerencia->contenido }}</p>
                        <p>Usuario: {{ $sugerencia->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
