<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Actualizar</span>
                            <br>

                            <!-- Mostrar mensajes de error si existen -->
                            <?php if (session()->getFlashdata('msg')): ?>
                                <div class="card-panel red white-text">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/horaextra/update/' . $data['id']) ?>" method="post">
                                <div class="input-field">
                                    <input id="horas" type="text" name="horas" class="validate" value="<?= $data['horas'] ?>" required>
                                    <label for="horas">Horas</label>
                                    <?php if (isset($errors['horas'])): ?>
                                        <span class="red-text"><?= $errors['horas'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="monto" type="text" name="monto" class="validate" value="<?= $data['monto'] ?>" equired>
                                    <label for="monto">monto</label>
                                    <?php if (isset($errors['monto'])): ?>
                                        <span class="red-text"><?= $errors['monto'] ?></span>
                                    <?php endif; ?>
                                </div>


                                <div class="input-field">
                                    <label for="options">Seleccione un empleado:</label><br>
                                    <select id="options" name="empleado">
                                        <?php foreach ($empleados as $record):
                                            $selected = '';
                                            if ($data['empleado'] == $record['id']):
                                                $selected = 'selected';
                                            endif;
                                        ?>
                                            <option <?= $selected ?> value="<?= $record['id'] ?>"><?= $record['nombres'] . ' ' . $record['apellidos'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label for="options">Seleccione si es festivo:</label><br>
                                    <select id="options" name="festivo">
                                        <option <?= $data['estado'] == 'Si' ? 'selected' : '' ?> value="Si">Si</option>
                                        <option <?= $data['estado'] == 'No' ? 'selected' : '' ?> value="No">No</option>

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