@extends('layouts.app')
@section('css')
    <style>
        .invalid{
            border: 1px solid red !important;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-black">Editar usuario</h2>
            <hr class="text-black mb-4" />
            <form action="{{ route('admin.user.update', $user) }}" method="POST" class="form">
                @csrf  @method('PUT')
                <div>
                    <label for="name" class="my-2">Nombre:</label>
                    <input type="text" class="form-control @error('name')
                        invalid
                    @enderror" name="name" placeholder="Nombre" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="my-2">Correo:</label>
                    <input type="email" class="form-control @error('email')
                        invalid
                    @enderror" name="email" placeholder="Correo" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="my-2">Contraseña:</label>
                    <input type="password" class="form-control @error('password')
                        invalid
                    @enderror" name="password" placeholder="Contraseña" value="{{ old('password') }}">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="role" class="my-2">Rol:</label>
                    <select name="role" class="form-control @error('role')
                        invalid
                    @enderror">
                        <option value="" default>Seleccione un rol</option>
                        <option value="admin" @selected($user->role == 'admin')>Admin</option>
                        <option value="user" @selected($user->role == 'user')>User</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning my-2">Actualizar</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>
</div>
@endsection
