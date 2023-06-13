@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <a href="{{ route('admin.user.index') }}">Inicio</a>
                    <span> / </span>
                    <a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a>
                </div>

                <h2 class="text-black">Usuario #{{ $user->id }} <span>{{ $user->name }}</span></h2>
                <hr class="text-black" />

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $user->name }}</h2>
                        <p>Correo: {{ $user->email }}</p>
                        <p>Rol: {{ $user->role }}</p>
                        <p>Usuario creado: {{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
