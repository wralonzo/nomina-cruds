<main style="margin-left: 200px;">
    <div class="container" style="margin-top: 20px;">
        <h3 class="center-align">Listado de cobros/descuentos a empleados</h3>
        <a href="<?= base_url('cobro/register') ?>" class="btn btn-danger">Nuevo</a>
        <!-- Mostrar mensajes de error si existen -->
        <?php if (session()->getFlashdata('msg')): ?>
            <br>
            <div class="card-panel red white-text">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <br>
        <?php endif; ?>
        <table class="highlight tableData" id="tableDatos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Monto</th>
                    <th>Detalle</th>
                    <th>Empleado</th>
                    <th>Fecha</th>
                    <th class="center-align">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['monto'])  ?></td>
                        <td><?= esc($user['detalle']) ?></td>
                        <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos'])  ?></td>
                        <td><?= esc($user['created_at'])  ?></td>

                        <td class="center-align">
                            <a href="<?= base_url('cobro/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">edit</i></a>
                            <a href="<?= base_url('cobro/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red"> <i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>