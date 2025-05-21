<!DOCTYPE html>
<html>
<head>
    <title>Mis Notas</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

    <div class="container">

        <h1 class="titulo-principal">Notas de {{ Auth::user()->name }}</h1>

        <!-- Formulario para cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn-cerrar-sesion">Cerrar sesión</button>
        </form>

        @if (session('success'))
            <p class="mensaje-exito">{{ session('success') }}</p>
        @endif

        <div class="acciones">
            <a href="{{ route('notas.create') }}" class="accion-link">➕ Crear nueva nota</a>
            <a href="{{ route('notas.favoritos') }}" class="accion-link">⭐ Favoritos</a>
            <a href="{{ route('notas.papelera') }}" class="accion-link">🗑️ Papelera</a>
        </div>

        <hr class="separador">

        @foreach ($notas as $nota)
            <div class="nota">
                <h2 class="titulo-nota">{{ $nota->titulo }}</h2>
                <p class="contenido-nota">{{ $nota->contenido }}</p>

                @if ($nota->imagen)
                    <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen de nota" class="imagen-nota">
                @endif

                <div class="acciones-nota">
                    <a href="{{ route('notas.edit', $nota->id) }}" class="editar-link">✏️ Editar</a>

                    <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" class="form-eliminar">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar esta nota?')" class="btn-eliminar">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('notas.descargarPDF', $nota->id) }}" target="_blank" class="descargar-pdf">📄 Descargar PDF</a>

                    <form action="{{ route('notas.toggleFavorito', $nota->id) }}" method="POST" class="form-favorito">
                        @csrf
                        <button type="submit" class="btn-favorito">
                            {{ $nota->favorito ? '💔 Quitar Favorito' : '💙 Marcar Favorito' }}
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="ver-papelera">
            <a href="{{ route('notas.papelera') }}">🗑️ Ver papelera</a>
        </div>
    </div>

</body>
</html>
