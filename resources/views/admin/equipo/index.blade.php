@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="text-white">Lista de equipos</h2>
            <hr class="text-white mb-4" />

            <div class="d-flex col-12 justify-content-end my-3">
                <a href="{{ route('admin.equipo.create') }}" class="btn btn-success mx-2">Crear</a>
            </div>

            <table class="table bg-white text-black rounded">
                <thead>
                    <tr>
                        <th>Lugar</th>
                        <th>Nombre</th>
                        <th>Victorias</th>
                        <th>Empates</th>
                        <th>Derrotas</th>
                        <th>Últimos 5 partidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                        @php
                            $globalIndex = $equipos->firstItem() + $loop->index;
                        @endphp
                        <tr>
                            <td>
                                @if ($globalIndex === 1)
                                    <div class="bg-info d-flex p-2">
                                        <b class="text-warning mx-auto">{{ $globalIndex }}</b>
                                    </div>
                                @endif
                                @if ($globalIndex === 2)
                                    <div class="bg-info d-flex p-2">
                                        <b class="text-white mx-auto">{{ $globalIndex }}</b>
                                    </div>
                                @endif
                                @if ($globalIndex === 3)
                                    <div class="bg-info d-flex p-2">
                                        <b class="text-danger mx-auto">{{ $globalIndex }}</b>
                                    </div>
                                @endif
                                @if ($globalIndex > 3)
                                    <div class="d-flex p-2">
                                        <b class="mx-auto">{{ $globalIndex }}</b>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $equipo->nombre }}</td>
                            <td>{{ $equipo->victorias }}</td>
                            <td>{{ $equipo->empates }}</td>
                            <td>{{ $equipo->derrotas }}</td>
                            <td class="d-flex justify-content-start my-auto">
                                @forelse ($equipo->partidos()->take(5)->orderBy('fecha', 'desc')->get() as $partido)
                                    @if ($partido->equipo_local_goles == $partido->equipo_visitante_goles)
                                        <div class="bg-warning mx-1 p-2">
                                            <span class="text-white">E</span>
                                        </div>
                                    @endif
                                    @if ($equipo->id === $partido->equipo_local_id)
                                        @if ($partido->equipo_local_goles > $partido->equipo_visitante_goles)
                                            <div class="bg-success mx-1 p-2">
                                                <span class="text-white">V</span>
                                            </div>
                                        @endif
                                        @if ($partido->equipo_local_goles < $partido->equipo_visitante_goles)
                                            <div class="bg-danger mx-1 p-2">
                                                <span class="text-white">D</span>
                                            </div>
                                        @endif
                                    @endif
                                    @if ($equipo->id === $partido->equipo_visitante_id)
                                        @if ($partido->equipo_local_goles > $partido->equipo_visitante_goles)
                                            <div class="bg-danger mx-1 p-2">
                                                <span class="text-white">D</span>
                                            </div>
                                        @endif
                                        @if ($partido->equipo_local_goles < $partido->equipo_visitante_goles)
                                            <div class="bg-success mx-1 p-2">
                                                <span class="text-white">V</span>
                                            </div>
                                        @endif
                                    @endif
                                @empty
                                    <div class="d-flex justify-content-center w-100 mx-1 p-2">
                                        <span>No hay partidos recientes</span>
                                    </div>
                                @endforelse
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.equipo.show', $equipo) }}">
                                        <button class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i>
                                            Ver mas
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.equipo.edit', $equipo) }}">
                                        <button class="btn btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.equipo.destroy', $equipo) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $equipos->links() }}

        </div>
    </div>
</div>
@endsection
