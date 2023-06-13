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
            <h2 class="text-black">Crear partido</h2>
            <hr class="text-black mb-4" />

            @if (session()->get('message'))
                <div class="alert alert-danger">
                    <span>{{ session()->get('message') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.partido.store') }}" method="POST" class="form">
                @csrf
                <div>
                    <label for="equipo_local_id" class="my-2">Equipo local:</label>
                    <select name="equipo_local_id" class="form-control @error('equipo_local_id')
                        invalid
                    @enderror">
                        <option value="" default>Seleccione un equipo</option>
                        @forelse ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @empty
                            <option value="" disabled>No hay equipos para mostrar</option>
                        @endforelse
                    </select>
                    @error('equipo_local_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="equipo_local_goles" class="my-2">Cantidad de goles del local:</label>
                    <input type="number" min="0" class="form-control @error('equipo_local_goles')
                        invalid
                    @enderror" name="equipo_local_goles" placeholder="Equipo local goles" value="{{ old('equipo_local_goles') }}">
                    @error('equipo_local_goles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="equipo_visitante_id" class="my-2">Equipo visitante:</label>
                    <select name="equipo_visitante_id" class="form-control @error('equipo_visitante_id')
                        invalid
                    @enderror">
                        <option value="" default>Seleccione un equipo</option>
                        @forelse ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @empty
                            <option value="" disabled>No hay equipos para mostrar</option>
                        @endforelse
                    </select>
                    @error('equipo_visitante_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="equipo_visitante_goles" class="my-2">Cantidad de goles del visitante:</label>
                    <input type="number" min="0" class="form-control @error('equipo_visitante_goles')
                        invalid
                    @enderror" name="equipo_visitante_goles" placeholder="Equipo visitante goles" value="{{ old('equipo_visitante_goles') }}">
                    @error('equipo_visitante_goles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="arbitro_id" class="my-2">Arbitro:</label>
                    <select name="arbitro_id" class="form-control @error('arbitro_id')
                        invalid
                    @enderror">
                        <option value="" default>Seleccione un arbitro</option>
                        @forelse ($arbitros as $arbitro)
                            <option value="{{ $arbitro->id }}">{{ $arbitro->nombre }}</option>
                        @empty
                            <option value="" disabled>No hay arbitros para mostrar</option>
                        @endforelse
                    </select>
                    @error('arbitro_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="fecha" class="my-2">Fecha:</label>
                    <input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control" placeholder="Fecha" min="{{ date('Y-m-d') }}">
                    @error('fecha')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success my-2">Crear</button>
                <a href="{{ route('admin.partido.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>
</div>
@endsection
