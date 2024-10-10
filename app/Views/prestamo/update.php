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

                            <form action="<?= base_url('/prestamo/update/' . $data['id']) ?>" method="post">
                                <div class="input-field">
                                    <input id="monto" type="text" name="monto" class="validate" value="<?= $data['monto'] ?>" required>
                                    <label for="monto">Monto</label>
                                    <?php if (isset($errors['monto'])): ?>
                                        <span class="red-text"><?= $errors['monto'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="cuotas" type="text" name="cuotas" class="validate" value="<?= $data['cuotas'] ?>" equired>
                                    <label for="cuotas">Coutas</label>
                                    <?php if (isset($errors['cuotas'])): ?>
                                        <span class="red-text"><?= $errors['cuotas'] ?></span>
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
                                    <input id="saldo" type="text" name="saldo" class="validate" value="<?= $data['saldo'] ?>" equired>
                                    <label for="saldo">Saldo</label>
                                    <?php if (isset($errors['saldo'])): ?>
                                        <span class="red-text"><?= $errors['saldo'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="input-field">
                                    <input id="cuotaspendientes" type="text" name="cuotaspendientes" class="validate" value="<?= $data['cuotaspendientes'] ?>" equired>
                                    <label for="cuotaspendientes">Cuotas pendientes</label>
                                    <?php if (isset($errors['cuotaspendientes'])): ?>
                                        <span class="red-text"><?= $errors['cuotaspendientes'] ?></span>
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