@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <a href="{{ route('admin.equipo.index') }}">Inicio</a>
                    <span> / </span>
                    <a href="{{ route('admin.equipo.show', $equipo->nombre) }}">{{ $equipo->nombre }}</a>
                </div>

                <h2 class="text-black">Equipo #{{ $equipo->id }} <span>{{ $equipo->nombre }}</span></h2>
                <hr class="text-black" />

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $equipo->name }}</h2>
                        <p>Victorias: {{ $equipo->victorias }}</p>
                        <p>Empates: {{ $equipo->empates }}</p>
                        <p>Derrotas: {{ $equipo->derrotas }}</p>
                        <p>Jugadores:</p>
                        <div>
                            @forelse ($equipo->deportistas as $deportista)
                                <div>
                                    <span>Nombre: {{ $deportista->nombre }}</span>
                                    <span>Edad: {{ $deportista->edad }}</span>
                                    <span>
                                        Goles: {{ $deportista->cantidad_goles }}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <circle fill="#ffffff" cx="12" cy="12" r="10"/>
                                            <path fill="#1e90ff" d="M12,2c-5.5,0-10,4.5-10,10c0,5.5,4.5,10,10,10s10-4.5,10-10C22,6.5,17.5,2,12,2z M12,20c-4.4,0-8-3.6-8-8c0-4.4,3.6-8,8-8s8,3.6,8,8C20,16.4,16.4,20,12,20z M10,12c0-2.2,1.8-4,4-4s4,1.8,4,4s-1.8,4-4,4S10,14.2,10,12z"/>
                                            <circle fill="#ffffff" cx="12" cy="12" r="2.5"/>
                                        </svg>
                                    </span>
                                </div>
                            @empty
                                <span>No hay jugadores en el equipo</span>
                            @endforelse
                        </div>
                        <p>Últimos 10 partidos:</p>
                        <div class="d-flex flex-column">
                            @forelse ($equipo->partidos()->take(5)->orderBy('fecha', 'desc')->get() as $partido)
                                @if ($partido->equipo_local_goles == $partido->equipo_visitante_goles)
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="bg-warning mx-1 p-2">
                                            <span class="text-white">E</span>
                                        </div>
                                        <div>
                                            <span>{{ $partido->equipoLocal->nombre }}</span>
                                            <b>{{ $partido->equipo_local_goles }}</b>
                                        </div>
                                        <b>-</b>
                                        <div>
                                            <b>{{ $partido->equipo_visitante_goles }}</b>
                                            <span>{{ $partido->equipoVisitante->nombre }}</span>
                                        </div>
                                        <span class="d-none">{{ Carbon\Carbon::setLocale('es') }}</span>
                                        <p class="my-auto mx-1">{{ Carbon\Carbon::parse($partido->fecha)->diffForHumans([
                                            'parts' => 2,
                                            'join' => ' y ',
                                            'syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                                        ]) }}</p>
                                    </div>
                                @endif
                                @if ($equipo->id === $partido->equipo_local_id)
                                    @if ($partido->equipo_local_goles > $partido->equipo_visitante_goles)
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="bg-success mx-1 p-2">
                                                <span class="text-white">V</span>
                                            </div>
                                            <div>
                                                <span>{{ $partido->equipoLocal->nombre }}</span>
                                                <b>{{ $partido->equipo_local_goles }}</b>
                                            </div>
                                            <b>-</b>
                                            <div>
                                                <b>{{ $partido->equipo_visitante_goles }}</b>
                                                <span>{{ $partido->equipoVisitante->nombre }}</span>
                                            </div>
                                            <span class="d-none">{{ Carbon\Carbon::setLocale('es') }}</span>
                                            <p class="my-auto mx-1">{{ Carbon\Carbon::parse($partido->fecha)->diffForHumans([
                                                'parts' => 2,
                                                'join' => ' y ',
                                                'syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                                            ]) }}</p>
                                        </div>
                                    @endif
                                    @if ($partido->equipo_local_goles < $partido->equipo_visitante_goles)
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="bg-danger mx-1 p-2">
                                                <span class="text-white">D</span>
                                            </div>
                                            <div>
                                                <span>{{ $partido->equipoLocal->nombre }}</span>
                                                <b>{{ $partido->equipo_local_goles }}</b>
                                            </div>
                                            <b>-</b>
                                            <div>
                                                <b>{{ $partido->equipo_visitante_goles }}</b>
                                                <span>{{ $partido->equipoVisitante->nombre }}</span>
                                            </div>
                                            <span class="d-none">{{ Carbon\Carbon::setLocale('es') }}</span>
                                            <p class="my-auto mx-1">{{ Carbon\Carbon::parse($partido->fecha)->diffForHumans([
                                                'parts' => 2,
                                                'join' => ' y ',
                                                'syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                                            ]) }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($equipo->id === $partido->equipo_visitante_id)
                                    @if ($partido->equipo_local_goles > $partido->equipo_visitante_goles)
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="bg-danger mx-1 p-2">
                                                <span class="text-white">D</span>
                                            </div>
                                            <div>
                                                <span>{{ $partido->equipoLocal->nombre }}</span>
                                                <b>{{ $partido->equipo_local_goles }}</b>
                                            </div>
                                            <b>-</b>
                                            <div>
                                                <b>{{ $partido->equipo_visitante_goles }}</b>
                                                <span>{{ $partido->equipoVisitante->nombre }}</span>
                                            </div>
                                            <span class="d-none">{{ Carbon\Carbon::setLocale('es') }}</span>
                                            <p class="my-auto mx-1">{{ Carbon\Carbon::parse($partido->fecha)->diffForHumans([
                                                'parts' => 2,
                                                'join' => ' y ',
                                                'syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                                            ]) }}</p>
                                        </div>
                                    @endif
                                    @if ($partido->equipo_local_goles < $partido->equipo_visitante_goles)
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="bg-success mx-1 p-2">
                                                <span class="text-white">V</span>
                                            </div>
                                            <div>
                                                <span>{{ $partido->equipoLocal->nombre }}</span>
                                                <b>{{ $partido->equipo_local_goles }}</b>
                                            </div>
                                            <b>-</b>
                                            <div>
                                                <b>{{ $partido->equipo_visitante_goles }}</b>
                                                <span>{{ $partido->equipoVisitante->nombre }}</span>
                                            </div>
                                            <span class="d-none">{{ Carbon\Carbon::setLocale('es') }}</span>
                                            <p class="my-auto mx-1">{{ Carbon\Carbon::parse($partido->fecha)->diffForHumans([
                                                'parts' => 2,
                                                'join' => ' y ',
                                                'syntax' => Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                                            ]) }}</p>
                                        </div>
                                    @endif
                                @endif
                            @empty
                                <span>No hay partidos recientes</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
