@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <a href="{{ route('admin.partido.index') }}">Inicio</a>
                    <span> / </span>
                    <a href="{{ route('admin.partido.show', $partido->id) }}">{{ $partido->equipoLocal->nombre." vs ".$partido->equipoVisitante->nombre }}</a>
                </div>

                <h2 class="text-black">Partido #{{ $partido->id }} <span>{{ $partido->equipoLocal->nombre." vs ".$partido->equipoVisitante->nombre }}</span></h2>
                <hr class="text-black" />

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $partido->equipoLocal->nombre." vs ".$partido->equipoVisitante->nombre }}</h2>
                        @if ($partido->finalizado == true)
                            <span class="text-danger">Finalizado</span>
                        @else
                            <span class="d-none">{{ Carbon\Carbon::setLocale('es') }}</span>
                            <p>Fecha: {{ Carbon\Carbon::parse($partido->fecha)->diffForHumans([
                                'parts' => 2,
                                'join' => ' y ',
                                'syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                            ]) }}</p>
                        @endif
                        @if ($partido->equipo_local_goles && $partido->equipo_visitante_goles)
                            <p>Resultado: <span>{{ $partido->equipoLocal->nombre }}</span> <b>{{ $partido->equipo_local_goles }}</b> - <b>{{ $partido->equipo_visitante_goles }}</b> <span>{{ $partido->equipoVisitante->nombre }}</span></p>
                        @endif
                        <p>Arbitro: {{ $partido->arbitro->nombre }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
