<!DOCTYPE html>
<html>
<head>
    <title>Papelera de Notas</title>
    <link rel="stylesheet" href="{{ asset('css/papelera.css') }}">
</head>
<body>

    <div class="container">

        <h1 class="titulo">Papelera de notas</h1>

        @if(session('success'))
            <p class="mensaje-exito">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('notas.index') }}" class="link-volver">← Volver a mis notas</a>

        <hr class="separador">

        @if($notasEliminadas->isEmpty())
            <p class="sin-notas">No hay notas en la papelera.</p>
        @else
            @foreach($notasEliminadas as $nota)
                <div class="nota">
                    <h2 class="nota-titulo">{{ $nota->titulo }}</h2>
                    <p class="nota-contenido">{{ $nota->contenido }}</p>

                    <form action="{{ route('notas.restaurar', $nota->id) }}" method="POST" class="form-restaurar">
                        @csrf
                        <button type="submit" class="btn-restaurar">♻️ Restaurar</button>
                    </form>

                    <form action="{{ route('notas.eliminarDefinitivo', $nota->id) }}" method="POST" class="form-eliminar">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar definitivamente esta nota?')" class="btn-eliminar">🗑️ Eliminar definitivamente</button>
                    </form>
                </div>
            @endforeach
        @endif

    </div>

</body>
</html>
