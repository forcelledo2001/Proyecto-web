@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <a href="{{ route('admin.deportista.index') }}">Inicio</a>
                    <span> / </span>
                    <a href="{{ route('admin.deportista.show', $deportista->id) }}">{{ $deportista->nombre }}</a>
                </div>

                <h2 class="text-black">Deportista #{{ $deportista->id }} <span>{{ $deportista->nombre }}</span></h2>
                <hr class="text-black" />

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $deportista->nombre }}</h2>
                        <p>Edad: {{ $deportista->edad }}</p>
                        <p>Equipo: {{ $deportista->equipo->nombre }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
