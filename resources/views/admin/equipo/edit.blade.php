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
            <h2 class="text-black">Editar equipo</h2>
            <hr class="text-black mb-4" />
            <form action="{{ route('admin.equipo.update', $equipo) }}" method="POST" class="form">
                @csrf  @method('PUT')
                <div>
                    <label for="nombre" class="my-2">Nombre:</label>
                    <input type="text" class="form-control @error('nombre')
                        invalid
                    @enderror" name="nombre" placeholder="Nombre" value="{{ old('nombre', $equipo->nombre) }}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="victorias" class="my-2">Victorias:</label>
                    <input type="number" min="0" class="form-control @error('victorias')
                        invalid
                    @enderror" name="victorias" placeholder="Victorias" value="{{ old('victorias', $equipo->victorias) }}">
                    @error('victorias')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="empates" class="my-2">Empates:</label>
                    <input type="number" min="0" class="form-control @error('empates')
                        invalid
                    @enderror" name="empates" placeholder="Empates" value="{{ old('empates', $equipo->empates) }}">
                    @error('empates')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="derrotas" class="my-2">Derrotas:</label>
                    <input type="number" min="0" class="form-control @error('derrotas')
                        invalid
                    @enderror" name="derrotas" placeholder="Derrotas" value="{{ old('derrotas', $equipo->derrotas) }}">
                    @error('derrotas')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning my-2">Actualizar</button>
                <a href="{{ route('admin.equipo.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>
</div>
@endsection
