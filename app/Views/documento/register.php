<main>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col s12 m8 offset-m2 l9 offset-l3">
                <!-- Card para el formulario de login -->
                <div class="card-action center-align">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Registrar Documento</span>
                            <br>

                            <!-- Mostrar mensajes de error si existen -->
                            <?php if (session()->getFlashdata('msg')): ?>
                                <div class="card-panel red white-text">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('/documento/register?id='.$empleado) ?>" method="post"  enctype="multipart/form-data">

                                <div class="input-field">
                                    <input id="nombre" type="text" name="nombre" class="validate" value="<?= old('nombre') ?>" required>
                                    <label for="apellidos">Detalle</label>
                                </div>

                                <div class="input-field">
                                    <input id="archivo" type="file" name="archivo" class="validate" value="<?= old('archivo') ?>" required>
                                    <label for="edad">Archivo</label>
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