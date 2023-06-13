@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="text-white">Lista de sugerencias</h2>
            <hr class="text-white mb-4" />

            @if (auth()->user()->role === 'user')
                <div class="d-flex col-12 justify-content-end my-3">
                    <a href="{{ route('admin.sugerencia.create') }}" class="btn btn-success mx-2">Crear</a>
                </div>
            @endif

            <table class="table bg-white text-black rounded">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Contenido</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sugerencias as $sugerencia)
                        <tr>
                            <td>{{ $sugerencia->id }}</td>
                            <td>{{ $sugerencia->contenido }}</td>
                            <td>{{ $sugerencia->user->name }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.sugerencia.show', $sugerencia) }}">
                                        <button class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i>
                                            Ver mas
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.sugerencia.destroy', $sugerencia) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sugerencias->links() }}

        </div>
    </div>
</div>
@endsection
