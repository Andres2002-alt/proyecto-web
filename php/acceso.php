<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso PowerFit</title>
    <link rel="stylesheet" href="css/estilos_login.css"> 
</head>
<body>

<main class="contenedor-principal">
    <section class="seccion-visual">
        <div class="overlay-oscuro">
            <h1>POWERFIT</h1>
            <h2>ÚNETE A LA ÉLITE DEL FITNESS</h2>
            <p>Inicia sesión para gestionar tu plan y tus compras.</p>
        </div>
    </section>

    <section class="seccion-login">
        <div class="login-box">
            <h2>Bienvenido</h2>
            <p>Ingresa tus datos para continuar</p>

            <form action="login_proceso.php" method="POST">
                <div class="input-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" required placeholder="ejemplo@correo.com">
                </div>

                <div class="input-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" required placeholder="••••••••">
                </div>

                <button type="submit" class="btn-login">Entrar</button>
            </form>

            <div class="separador">
                <span>¿Eres nuevo?</span>
            </div>

            <a href="registro.php" class="btn-registro-alternativo">Crear una cuenta nueva</a>
            
            <p class="footer-login">
                <a href="index.html">← Volver a los planes</a>
            </p>
        </div>
    </section>
</main>

</body>
</html>