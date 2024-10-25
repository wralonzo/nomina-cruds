<main style="margin-left: 300px;">
    <div class="container-fluid" style="margin-top: 20px;">
        <h3 class="center-align">Ficha del empleado</h3>
        <br>
        <br> <!-- Mostrar mensajes de error si existen -->
        <?php if (session()->getFlashdata('msg')): ?>
            <br>
            <div class="card-panel red white-text">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <br>
        <?php endif; ?>

        <div style="margin-left: 20px; margin-right: 20px" class="card">
            <div class="card-content">
                <a href="<?= base_url('detalle/register?id=' . $empleado) ?>" class="btn btn-danger">Registrar Hijo(a)/Esposa(o)</a>
                <span class="card-title">Esposa</span>
                <table class="highlight tableData">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($esposas as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['nombres'])  ?></td>
                                <td class="center-align"><?= esc($user['edad']) ?></td>
                                <td class="center-align">
                                    <a href="<?= base_url('detalle/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">edit</i></a>
                                    <a href="<?= base_url('detalle/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red"> <i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br><br>
                <span class="card-title">Hijos</span>
                <table class="highlight tableData">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hijos as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['nombres']) ?></td>
                                <td class="center-align"><?= esc($user['edad']) ?></td>
                                <td class="center-align">
                                    <a href="<?= base_url('detalle/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">edit</i></a>
                                    <a href="<?= base_url('detalle/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red"> <i class="material-icons">delete</i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br><br>
                <span class="card-title">Documentos</span>
                <a href="<?= base_url('documento/register?id=' . $empleado) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">add</i></a>
                <table class="highlight tableData">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Archivo</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($docs as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['nombre']) ?></td>
                                <td class="center-align"><a href="<?= base_url('uploads/'.$user['path']) ?>" target="_blank"><?= $user['path']?></a> </td>
                                <td class="center-align">
                                    <a href="<?= base_url('documento/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">edit</i></a>
                                    <a href="<?= base_url('documento/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red"> <i class="material-icons">delete</i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <!-- Card de Permisos -->
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Permisos</span>
                        <table class="highlight tableData">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Detalle</th>
                                    <th>Estado</th>
                                    <th class="center-align">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($permisos as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['detalle'])  ?></td>
                                        <td class="center-align"><?= esc($user['estado']) ?></td>
                                        <td class="center-align">
                                            <?= esc($user['created_at'])  ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Card de Horas Extras -->
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Horas Extras</span>
                        <table class="highlight tableData">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Estado civil</th>
                                    <th class="center-align">Festivo</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($horas as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['horas']) ?></td>
                                        <td class="center-align"><?= esc($user['monto']) ?></td>
                                        <td class="center-align">
                                            <?= esc($user['festivo']) ?>
                                        </td>
                                        <th> <?= esc($user['created_at'])  ?></th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Card de Salarios -->
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Salarios</span>
                        <a href="<?= base_url('salario/register?id=' . $empleado) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">add</i></a>
                        <table class="highlight tableData">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th class="center-align">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salarios as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['monto']) ?></td>
                                        <td class="center-align"><?= esc($user['created_at']) ?></td>
                                        <td class="center-align">
                                        <td class="center-align">
                                            <a href="<?= base_url('salario/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">edit</i></a>
                                            <a href="<?= base_url('salario/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red"> <i class="material-icons">delete</i></a>

                                        </td>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Card de Créditos -->
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Créditos</span>
                        <table class="highlight tableData">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Monto</th>
                                    <th>Cuotas</th>
                                    <th class="center-align">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($prestamos as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['monto']) ?></td>
                                        <td class="center-align"><?= esc($user['cuotas']) ?></td>
                                        <td class="center-align"><?= esc($user['saldo']) ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Continuar agregando más tablas en tarjetas según sea necesario -->
    </div>
</main>