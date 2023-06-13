@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="text-white">Lista de partidos</h2>
            <hr class="text-white mb-4" />

            <div class="d-flex col-12 justify-content-end my-3">
                <a href="{{ route('admin.partido.create') }}" class="btn btn-success mx-2">Crear</a>
            </div>

            <table class="table bg-white text-black rounded">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipo local</th>
                        <th>Equipo visitante</th>
                        <th>Arbitro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partidos as $partido)
                        <tr>
                            <td>{{ $partido->id }}</td>
                            <td>{{ $partido->equipoLocal->nombre }}</td>
                            <td>{{ $partido->equipoVisitante->nombre }}</td>
                            <td>{{ $partido->arbitro->nombre }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.partido.show', $partido) }}">
                                        <button class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i>
                                            Ver mas
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.partido.edit', $partido) }}">
                                        <button class="btn btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.partido.destroy', $partido) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $partidos->links() }}

        </div>
    </div>
</div>
@endsection
