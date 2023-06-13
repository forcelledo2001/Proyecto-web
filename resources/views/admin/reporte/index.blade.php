<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cronograma</title>
</head>
<body>
    <h2>Partidos</h2>
    <hr>
    @foreach ($partidos as $partido)
        <div class="d-flex flex-column justify-content-start">
            <p>{{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}</p>
            <span>Arbitro: {{ $partido->arbitro->nombre }}</span>
        </div>
    @endforeach
</body>
</html>
