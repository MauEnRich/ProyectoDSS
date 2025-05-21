<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nota {{ $nota->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .contenido {
            margin-top: 20px;
            font-size: 14px;
        }
        .imagen {
            margin-top: 20px;
            text-align: center;
        }
        .imagen img {
            max-width: 300px;
            height: auto;
        }
        .footer {
            margin-top: 50px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>{{ $nota->titulo }}</h1>

    <div class="contenido">
        {!! nl2br(e($nota->contenido)) !!}
    </div>

    @if($nota->imagen)
        <div class="imagen">
            <img src="{{ public_path('storage/' . $nota->imagen) }}" alt="Imagen de la nota">
        </div>
    @endif

    <div class="footer">
        Nota ID: {{ $nota->id }} <br>
        Creada por Usuario ID: {{ $nota->user_id }}
    </div>

</body>
</html>
