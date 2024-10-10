<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Actualizar departamento</span>
                            <br>
                            <form action="<?= base_url('/departamento/update/' . $data['id']) ?>" method="post">

                                <div class="input-field">
                                    <input id="nombre" type="text" name="nombre" class="validate" value="<?= $data['nombre']  ?>" required>
                                    <label for="nombre">Nombre</label>
                                    <?php if (isset($errors['nombre'])): ?>
                                        <span class="red-text"><?= $errors['nombre'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="porcentaje_comision" type="number" name="porcentaje_comision" value="<?= $data['porcentaje_comision']  ?>" required>
                                    <label for="porcentaje_comision">Porcenaje</label>
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