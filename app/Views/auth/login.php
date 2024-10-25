<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="indigo lighten-5"> <!-- Fondo suave para un mejor contraste -->

    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center-align">Bienvenido al sistema de nómina</span>
                        <br>

                        <!-- Mostrar mensajes de error si existen -->
                        <?php if (session()->getFlashdata('msg')): ?>
                            <div class="card-panel red white-text">
                                <?= session()->getFlashdata('msg') ?>
                            </div>
                            <br>
                            <br>
                        <?php endif; ?>

                        <form action="<?= base_url('/auth/login') ?>" method="post">
                            <div class="input-field">
                                <input id="email" type="text" name="email" class="validate" value="<?= old('email') ?>" required>
                                <label for="email">Usuario</label>
                                <!-- Mostrar error si existe -->
                                <?php if (isset($errors['email'])): ?>

                                    <?php var_dump($errors); ?>
                                    <span class="red-text"><?= $errors['email'] ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="input-field">
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Contraseña</label>
                                <?php if (isset($errors['password'])): ?>
                                    <span class="red-text"><?= $errors['password'] ?></span>
                                <?php endif; ?>
                            </div>

                            <br>
                            <div class="center-align">
                                <button class="btn waves-effect waves-light indigo" type="submit" name="action">Ingresar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-action center-align">
                        <!-- Puedes agregar algún enlace aquí si es necesario -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>