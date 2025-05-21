<!DOCTYPE html>
<html>
<head>
    <title>Crear Nota</title>
    <link rel="stylesheet" href="{{ asset('css/crearNota.css') }}">
</head>
<body>

    <div class="container">

        <h1>📝 Crear nueva nota</h1>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('notas.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" required>
            </div>

            <div class="form-group">
                <label>Contenido:</label>
                <textarea name="contenido" required>{{ old('contenido') }}</textarea>
            </div>

            <div class="form-group">
                <label>Imagen (opcional):</label>
                <input type="file" name="imagen" accept="image/*">
            </div>

            <button type="submit">💾 Guardar Nota</button>
        </form>

        <div class="back-link">
            <a href="{{ route('notas.index') }}">← Volver</a>
        </div>

    </div>

</body>
</html>
