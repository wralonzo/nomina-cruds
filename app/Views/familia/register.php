<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Registrar Famila</span>
                            <br>

                            <!-- Mostrar mensajes de error si existen -->
                            <?php if (session()->getFlashdata('msg')): ?>
                                <div class="card-panel red white-text">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/detalle/register?id='.$empleado) ?>" method="post">
                                <div class="input-field">
                                    <label for="options">Seleccione:</label><br>
                                    <select id="options" name="tipo">
                                        <option disabled selected>Seleeccione una opcion</option>
                                        <option value="Hijo">Hijo</option>
                                        <option value="Esposa">Esposa</option>

                                    </select>
                                </div>

                                <div class="input-field">
                                    <input id="nombres" type="text" name="nombres" class="validate" value="<?= old('nombres') ?>" required>
                                    <label for="apellidos">Nombres</label>
                                    <?php if (isset($errors['nombres'])): ?>
                                        <span class="red-text"><?= $errors['nombres'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="edad" type="text" name="edad" class="validate" value="<?= old('edad') ?>" required>
                                    <label for="edad">Edad</label>
                                    <?php if (isset($errors['edad'])): ?>
                                        <span class="red-text"><?= $errors['edad'] ?></span>
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