<!DOCTYPE html>
<html>
<head>
    <title>Editar Nota</title>
    <link rel="stylesheet" href="{{ asset('css/editarNota.css') }}">
</head>
<body>

    <div class="container">

        <h1>✏️ Editar Nota</h1>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('notas.update', $nota->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="titulo" value="{{ old('titulo', $nota->titulo) }}" required>
            </div>

            <div class="form-group">
                <label>Contenido:</label>
                <textarea name="contenido" required>{{ old('contenido', $nota->contenido) }}</textarea>
            </div>

            @if ($nota->imagen)
                <div class="form-group">
                    <label>Imagen actual:</label>
                    <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen actual" class="imagen-actual">
                </div>
            @endif

            <div class="form-group">
                <label>Reemplazar imagen:</label>
                <input type="file" name="imagen" accept="image/*">
            </div>

            <button type="submit">💾 Actualizar Nota</button>
        </form>

        <div class="back-link">
            <a href="{{ route('notas.index') }}">← Volver</a>
        </div>

    </div>

</body>
</html>
