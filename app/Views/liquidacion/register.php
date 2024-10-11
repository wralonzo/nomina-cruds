<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Registrar</span>
                            <br>

                            <!-- Mostrar mensajes de error si existen -->
                            <?php if (session()->getFlashdata('msg')): ?>
                                <div class="card-panel red white-text">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/liquidacion/register') ?>" method="post">
                                <div class="input-field">
                                    <input id="monto" type="text" name="monto" class="validate" value="<?= old('monto') ?>" required>
                                    <label for="monto">Monto</label>
                                    <?php if (isset($errors['monto'])): ?>
                                        <span class="red-text"><?= $errors['monto'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="fecha" type="date" name="fecha" class="validate" value="<?= old('fecha') ?>" required>
                                    <label for="fecha">Fecha</label>
                                    <?php if (isset($errors['fecha'])): ?>
                                        <span class="red-text"><?= $errors['fecha'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <label for="options">Seleccione un empleado:</label><br>
                                    <select id="options" name="empleado">
                                        <option disabled selected>Seleeccione una opcion</option>
                                        <?php foreach ($empleados as $record) ?>
                                        <option value="<?= $record['id'] ?>"><?= $record['nombres'] . ' ' . $record['apellidos'] ?></option>
                                        <?php ?>
                                    </select>
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