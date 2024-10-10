<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Actualizar usuario</span>
                            <br>
                            <form action="<?= base_url('/auth/update/' . $data['id']) ?>" method="post">
                                <div class="input-field">
                                    <input id="email" type="text" name="user" class="validate" value="<?= $data['user'] ?>" required>
                                    <label for="email">Usuario</label>
                                    <?php if (isset($errors['user'])): ?>
                                        <span class="red-text"><?= $errors['user'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="name" type="text" name="name" class="validate" value="<?= $data['name']  ?>" required>
                                    <label for="name">Nombre y apellidos</label>
                                    <?php if (isset($errors['name'])): ?>
                                        <span class="red-text"><?= $errors['name'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="email" type="text" name="email" class="validate" value="<?= $data['email']  ?>" required>
                                    <label for="email">Correo Electrónico</label>
                                    <?php if (isset($errors['email'])): ?>
                                        <span class="red-text"><?= $errors['email'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <label for="options">Seleccione una Rol:</label><br>
                                    <select id="options" name="role">
                                        <option <?= $data['role'] == 'Admin'  ? 'selected' : '' ?> value="Admin">Admin</option>
                                        <option <?= $data['role'] == 'Empleado'  ? 'selected' : '' ?> value="Empleado">Empleado</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <input id="password" type="password" name="password" class="validate">
                                    <label for="password">Contraseña</label>
                                    <?php if (isset($errors['password'])): ?>
                                        <span class="red-text"><?= $errors['password'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <br>
                                <div class="center-align">
                                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Guardar
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