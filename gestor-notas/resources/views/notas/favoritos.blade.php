<!DOCTYPE html>
<html>
<head>
    <title>Notas Favoritas de {{ Auth::user()->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/favoritos.css') }}">
</head>
<body>

    <div class="container">

        <h1 class="titulo">Notas Favoritas de {{ Auth::user()->name }}</h1>

        @if (session('success'))
            <p class="mensaje-exito">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('notas.index') }}" class="link-volver">← Volver a todas las notas</a>

        <hr class="separador">

        @forelse ($notas as $nota)
            <div class="nota">
                <h2 class="nota-titulo">{{ $nota->titulo }}</h2>
                <p class="nota-contenido">{{ $nota->contenido }}</p>

                @if ($nota->imagen)
                    <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen de nota" class="nota-imagen">
                @endif

                <div class="acciones">
                    <a href="{{ route('notas.edit', $nota->id) }}" class="accion-editar">✏️ Editar</a>

                    <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" class="form-eliminar">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar esta nota?')" class="btn-eliminar">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('notas.descargarPDF', $nota->id) }}" target="_blank" class="accion-pdf">📄 Descargar PDF</a>

                    <form action="{{ route('notas.toggleFavorito', $nota->id) }}" method="POST" class="form-favorito">
                        @csrf
                        <button type="submit" class="btn-favorito">
                            Quitar Favorito
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="sin-notas">No tienes notas favoritas aún.</p>
        @endforelse

    </div>

</body>
</html>
