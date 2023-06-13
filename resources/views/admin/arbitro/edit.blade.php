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
            <h2 class="text-black">Editar arbitros</h2>
            <hr class="text-black mb-4" />
            <form action="{{ route('admin.arbitro.update', $arbitro) }}" method="POST" class="form">
                @csrf  @method('PUT')
                <div>
                    <label for="nombre" class="my-2">Nombre:</label>
                    <input type="text" class="form-control @error('nombre')
                        invalid
                    @enderror" name="nombre" placeholder="Nombre" value="{{ old('nombre', $arbitro->nombre) }}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning my-2">Actualizar</button>
                <a href="{{ route('admin.arbitro.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>
</div>
@endsection
