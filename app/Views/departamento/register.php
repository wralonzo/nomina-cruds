<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Registrar departamento</span>
                            <br>

                            <!-- Mostrar mensajes de error si existen -->
                            <?php if (session()->getFlashdata('msg')): ?>
                                <div class="card-panel red white-text">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/departamento/register') ?>" method="post">
                                <div class="input-field">
                                    <input id="nombres" type="text" name="nombre" class="validate" value="<?= old('nombre') ?>" required>
                                    <label for="nombres">Nombre</label>
                                    <?php if (isset($errors['nombre'])): ?>
                                        <span class="red-text"><?= $errors['nombre'] ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="input-field">
                                    <input id="porcentaje_comision" type="number" name="porcentaje_comision" class="validate">
                                    <label for="porcentaje_comision">Porcentaje</label>
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