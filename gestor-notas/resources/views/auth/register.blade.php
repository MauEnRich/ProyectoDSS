<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>

    <div class="container">

        <h2>Crear cuenta</h2>

        @if($errors->any())
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nombre completo" required>

            <input type="email" name="email" placeholder="Correo electrónico" required>

            <input type="password" name="password" placeholder="Contraseña" required>

            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

            <button type="submit">Registrarse</button>
        </form>

        <p class="text-center">
            <a href="{{ route('login.form') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </p>

    </div>

</body>
</html>
