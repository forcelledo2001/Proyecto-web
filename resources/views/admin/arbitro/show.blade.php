@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <a href="{{ route('admin.arbitro.index') }}">Inicio</a>
                    <span> / </span>
                    <a href="{{ route('admin.arbitro.show', $arbitro->id) }}">{{ $arbitro->nombre }}</a>
                </div>

                <h2 class="text-black">Arbitro #{{ $arbitro->id }} <span>{{ $arbitro->nombre }}</span></h2>
                <hr class="text-black" />

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $arbitro->nombre }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
