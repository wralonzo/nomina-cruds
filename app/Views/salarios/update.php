<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Actualizar registro</span>
                            <br>
                            <form action="<?= base_url('/detalle/update/'. $data['id']) ?>" method="post">
                                <div class="input-field">
                                    <label for="options">Seleccione:</label><br>
                                    <select id="options" name="tipo">
                                        <option disabled selected>Seleeccione una opcion</option>
                                        <option <?= $data['tipo'] == 'Hijo' ? 'selected' : '' ?> value="Hijo">Hijo</option>
                                        <option <?= $data['tipo'] == 'Esposa' ? 'selected' : '' ?> value="Esposa">Esposa</option>

                                    </select>
                                </div>

                                <div class="input-field">
                                    <input id="email" type="text" name="nombres" class="validate" value="<?= $data['nombres'] ?>" required>
                                    <label for="nombres">Nombres</label>
                                    <?php if (isset($errors['nombres'])): ?>
                                        <span class="red-text"><?= $errors['nombres'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="edad" type="text" name="edad" class="validate" value="<?= $data['edad'] ?>" required>
                                    <label for="nombres">Nombres</label>
                                    <?php if (isset($errors['edad'])): ?>
                                        <span class="red-text"><?= $errors['edad'] ?></span>
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