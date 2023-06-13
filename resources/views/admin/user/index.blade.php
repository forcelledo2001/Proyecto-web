@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="text-white">Lista de usuarios</h2>
            <hr class="text-white mb-4" />

            <div class="d-flex col-12 justify-content-end my-3">
                <a href="{{ route('admin.user.create') }}" class="btn btn-success mx-2">Crear</a>
            </div>

            <table class="table bg-white text-black rounded">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 'admin' ? 'Admin' : 'User' }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('admin.user.show', $user) }}">
                                        <button class="btn btn-info text-white">
                                            <i class="fa fa-eye"></i>
                                            Ver mas
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.user.edit', $user) }}">
                                        <button class="btn btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                        @csrf @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Eliminar" />

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}

        </div>
    </div>
</div>
@endsection
