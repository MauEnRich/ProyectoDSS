<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 450px;">

        <h2 style="text-align: center; color: #1e3a8a; margin-bottom: 30px;">Crear cuenta</h2>

        @if($errors->any())
            <ul style="color: #dc2626; margin-bottom: 20px; font-size: 14px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nombre completo" required
                style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <input type="email" name="email" placeholder="Correo electrónico" required
                style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <input type="password" name="password" placeholder="Contraseña" required
                style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required
                style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">

            <button type="submit"
                style="width: 100%; background-color: #1e3a8a; color: white; border: none; padding: 12px; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Registrarse
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 14px;">
            <a href="{{ route('login.form') }}" style="color: #1e3a8a; text-decoration: none;">¿Ya tienes cuenta? Inicia sesión</a>
        </p>

    </div>

</body>
</html>
