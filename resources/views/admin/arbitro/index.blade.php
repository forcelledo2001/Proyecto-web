@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="text-white">Lista de arbitros</h2>
            <hr class="text-white mb-4" />

            <div class="d-flex col-12 justify-content-end my-3">
                <a href="{{ route('admin.arbitro.create') }}" class="btn btn-success mx-2">Crear</a>
            </div>

            <table class="table bg-white text-black rounded">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arbitros as $arbitro)
                        <tr>
                            <td>{{ $arbitro->id }}</td>
                            <td>{{ $arbitro->nombre }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.arbitro.show', $arbitro->id) }}">
                                        <button class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i>
                                            Ver mas
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.arbitro.edit', $arbitro->id) }}">
                                        <button class="btn btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.arbitro.destroy', $arbitro->id) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $arbitros->links() }}

        </div>
    </div>
</div>
@endsection
