<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Registrar usuario</span>
                            <br>

                            <!-- Mostrar mensajes de error si existen -->
                            <?php if (session()->getFlashdata('msg')): ?>
                                <div class="card-panel red white-text">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/auth/register') ?>" method="post">
                                <div class="input-field">
                                    <input id="email" type="text" name="user" class="validate" value="<?= old('user') ?>" required>
                                    <label for="email">Usuario</label>
                                    <?php if (isset($errors['user'])): ?>
                                        <span class="red-text"><?= $errors['user'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="name" type="text" name="name" class="validate" value="<?= old('name') ?>" required>
                                    <label for="name">Nombre y apellidos</label>
                                    <?php if (isset($errors['name'])): ?>
                                        <span class="red-text"><?= $errors['name'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="email" type="text" name="email" class="validate" value="<?= old('email') ?>" required>
                                    <label for="email">Correo Electrónico</label>
                                    <?php if (isset($errors['email'])): ?>
                                        <span class="red-text"><?= $errors['email'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <label for="options">Seleccione una Rol:</label><br>
                                    <select id="options" name="role">
                                        <option value="Admin">Admin</option>
                                        <option value="Empleado">Empleado</option>
                                    </select>
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
                                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Registrar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-action center-align">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>