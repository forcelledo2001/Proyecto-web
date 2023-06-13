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
            <h2 class="text-black">Crear sugerencia</h2>
            <hr class="text-black mb-4" />
            <form action="{{ route('admin.sugerencia.store') }}" method="POST" class="form">
                @csrf
                <div>
                    <label for="contenido" class="my-2">Contenido:</label>
                    <textarea name="contenido" class="form-control @error('contenido')
                        invalid
                    @enderror" cols="30" rows="10">
                        {{ old('contenido') }}
                    </textarea>
                    @error('contenido')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="correo" class="my-2">Correo:</label>
                    <input type="text" class="form-control @error('correo')
                        invalid
                    @enderror" name="correo" placeholder="Correo" value="{{ old('correo') }}">
                    @error('correo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning my-2">Crear</button>
                <a href="{{ route('admin.sugerencia.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>
</div>
@endsection
