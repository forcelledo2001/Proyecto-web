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
            <h2 class="text-black">Crear deportista</h2>
            <hr class="text-black mb-4" />
            <form action="{{ route('admin.deportista.store') }}" method="POST" class="form">
                @csrf
                <div>
                    <label for="nombre" class="my-2">Nombre:</label>
                    <input type="text" class="form-control @error('nombre')
                        invalid
                    @enderror" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="edad" class="my-2">Edad:</label>
                    <input type="number" class="form-control @error('edad')
                        invalid
                    @enderror" name="edad" placeholder="Edad" value="{{ old('edad') }}">
                    @error('edad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="cantidad_goles" class="my-2">Cantidad goles:</label>
                    <input type="number" min="0" class="form-control @error('cantidad_goles')
                        invalid
                    @enderror" name="cantidad_goles" placeholder="Cantidad goles" value="{{ old('cantidad_goles') }}">
                    @error('cantidad_goles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="equipo_id" class="my-2">Equipo:</label>
                    <select name="equipo_id" class="form-control @error('equipo_id')
                        invalid
                    @enderror">
                        <option disabled default>Seleccione un equipo</option>
                        @forelse ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @empty
                            <option value="" disabled>No hay equipos para mostrar</option>
                        @endforelse
                    </select>
                    @error('equipo_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning my-2">Crear</button>
                <a href="{{ route('admin.deportista.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>
</div>
@endsection
