<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Actualizar empleado</span>
                            <br>
                            <form action="<?= base_url('/empleado/update/' . $data['id']) ?>" method="post">
                                <div class="input-field">
                                    <input id="email" type="text" name="nombres" class="validate" value="<?= $data['nombres'] ?>" required>
                                    <label for="nombres">Nombres</label>
                                    <?php if (isset($errors['user'])): ?>
                                        <span class="red-text"><?= $errors['nombres'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="apellidos" type="text" name="apellidos" class="validate" value="<?= $data['apellidos']  ?>" required>
                                    <label for="apellidos">Apellidos</label>
                                    <?php if (isset($errors['apellidos'])): ?>
                                        <span class="red-text"><?= $errors['apellidos'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="estadocivil" type="text" name="estadocivil" class="validate" value="<?= $data['estadocivil']  ?>" required>
                                    <label for="estadocivil">Estado civil</label>
                                    <?php if (isset($errors['estadocivil'])): ?>
                                        <span class="red-text"><?= $errors['estadocivil'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="monto" type="number" name="monto" class="validate" value="<?= $data['monto']  ?>" required>
                                    <label for="monto">Salario</label>
                                    <?php if (isset($errors['monto'])): ?>
                                        <span class="red-text"><?= $errors['monto'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="input-field">
                                    <label for="options">Seleccione un departamento:</label><br>
                                    <select id="options" name="departamento">
                                        <?php foreach ($deptos as $record):
                                            $selected = '';
                                            if ($data['departamento'] == $record['id']):
                                                $selected = 'selected';
                                            endif;
                                        ?>
                                            <option <?= $selected ?> value="<?= $record['id'] ?>"><?= $record['nombre']  ?></option>
                                        <?php endforeach; ?>
                                    </select>
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