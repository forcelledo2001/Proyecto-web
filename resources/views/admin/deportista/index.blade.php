@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="text-white">Lista de deportistas</h2>
            <hr class="text-white mb-4" />

            <div class="d-flex col-12 justify-content-end my-3">
                <a href="{{ route('admin.deportista.create') }}" class="btn btn-success mx-2">Crear</a>
            </div>

            <table class="table bg-white text-black rounded">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Equipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deportistas as $deportista)
                        <tr>
                            <td>{{ $deportista->id }}</td>
                            <td>{{ $deportista->nombre }}</td>
                            <td>{{ $deportista->edad }}</td>
                            <td>{{ $deportista->equipo->nombre }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.deportista.show', $deportista->id) }}">
                                        <button class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i>
                                            Ver mas
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.deportista.edit', $deportista->id) }}">
                                        <button class="btn btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.deportista.destroy', $deportista->id) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $deportistas->links() }}

        </div>
    </div>
</div>
@endsection
