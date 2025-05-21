<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-container">

        <h2>Iniciar Sesión</h2>

        @if($errors->any())
            <p class="error-message">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Correo electrónico" required>

            <input type="password" name="password" placeholder="Contraseña" required>

            <button type="submit">Iniciar sesión</button>
        </form>

        <p class="register-text">
            <a href="{{ route('register.form') }}">¿No tienes cuenta? Regístrate</a>
        </p>

    </div>

</body>
</html>
