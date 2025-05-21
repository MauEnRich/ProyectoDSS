<!DOCTYPE html>
<html>
<head>
    <title>Notas Favoritas de {{ Auth::user()->name }}</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; color: #1e3a8a;">

    <div style="max-width: 800px; margin: 40px auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">

        <h1 style="text-align: center; color: #1e3a8a;">Notas Favoritas de {{ Auth::user()->name }}</h1>

        @if (session('success'))
            <p style="color: #16a34a; background-color: #dcfce7; padding: 10px; border-radius: 5px; margin-bottom: 20px; max-width: 500px; margin-left: auto; margin-right: auto; text-align: center;">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('notas.index') }}" style="display: inline-block; margin-bottom: 20px; color: #1e3a8a; text-decoration: none;">← Volver a todas las notas</a>

        <hr style="border: none; border-top: 1px solid #ccc; margin-bottom: 30px;">

        @forelse ($notas as $nota)
            <div style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #e5e7eb;">
                <h2 style="margin-bottom: 10px;">{{ $nota->titulo }}</h2>
                <p style="margin-bottom: 10px;">{{ $nota->contenido }}</p>

                @if ($nota->imagen)
                    <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen de nota" style="max-width: 100%; border-radius: 5px; margin-bottom: 10px;">
                @endif

                <div style="margin-top: 10px;">
                    <a href="{{ route('notas.edit', $nota->id) }}" style="margin-right: 10px; color: #2563eb; text-decoration: none;">✏️ Editar</a>

                    <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar esta nota?')" style="background: none; border: none; color: #dc2626; cursor: pointer;">🗑️ Eliminar</button>
                    </form>

                    <a href="{{ route('notas.descargarPDF', $nota->id) }}" target="_blank" style="margin-left: 10px; text-decoration: none; color: #0f766e;">📄 Descargar PDF</a>

                    <form action="{{ route('notas.toggleFavorito', $nota->id) }}" method="POST" style="display: inline; margin-left: 10px;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #eab308; cursor: pointer;">
                            Quitar Favorito
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p style="text-align: center; font-style: italic; color: #1e3a8a;">No tienes notas favoritas aún.</p>
        @endforelse

    </div>

</body>
</html>
