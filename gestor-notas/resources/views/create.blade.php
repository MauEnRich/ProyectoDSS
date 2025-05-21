<!DOCTYPE html>
<html>
<head>
    <title>Crear Nota</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; color: #1e3a8a;">

    <div style="max-width: 600px; margin: 50px auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">

        <h1 style="text-align: center; margin-bottom: 20px;">📝 Crear nueva nota</h1>

        @if ($errors->any())
            <ul style="color: #dc2626; background-color: #fee2e2; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('notas.store') }}" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Título:</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" required
                    style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Contenido:</label>
                <textarea name="contenido" required
                    style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px; height: 150px;">{{ old('contenido') }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Imagen (opcional):</label>
                <input type="file" name="imagen" accept="image/*"
                    style="padding: 5px; border: 1px solid #cbd5e1; border-radius: 5px;">
            </div>

            <button type="submit"
                style="width: 100%; background-color: #1e3a8a; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer;">
                💾 Guardar Nota
            </button>
        </form>

        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('notas.index') }}" style="text-decoration: none; color: #1e3a8a;">← Volver</a>
        </div>
    </div>

</body>
</html>
