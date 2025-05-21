<!DOCTYPE html>
<html>
<head>
    <title>Papelera de Notas</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; color: #1e3a8a;">

    <div style="max-width: 800px; margin: 40px auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">

        <h1 style="text-align: center; color: #1e3a8a;">Papelera de notas</h1>

        @if(session('success'))
            <p style="color: #16a34a; background-color: #dcfce7; padding: 10px; border-radius: 5px; margin-bottom: 20px; max-width: 500px; margin-left: auto; margin-right: auto; text-align: center;">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('notas.index') }}" style="display: inline-block; margin-bottom: 20px; color: #1e3a8a; text-decoration: none;">← Volver a mis notas</a>

        <hr style="border: none; border-top: 1px solid #ccc; margin-bottom: 30px;">

        @if($notasEliminadas->isEmpty())
            <p style="text-align: center; font-style: italic; color: #1e3a8a;">No hay notas en la papelera.</p>
        @else
            @foreach($notasEliminadas as $nota)
                <div style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #e5e7eb;">
                    <h2 style="margin-bottom: 10px;">{{ $nota->titulo }}</h2>
                    <p style="margin-bottom: 10px;">{{ $nota->contenido }}</p>

                    <form action="{{ route('notas.restaurar', $nota->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #059669; cursor: pointer; margin-right: 10px;">♻️ Restaurar</button>
                    </form>

                    <form action="{{ route('notas.eliminarDefinitivo', $nota->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar definitivamente esta nota?')" style="background: none; border: none; color: #dc2626; cursor: pointer;">🗑️ Eliminar definitivamente</button>
                    </form>
                </div>
            @endforeach
        @endif

    </div>

</body>
</html>
