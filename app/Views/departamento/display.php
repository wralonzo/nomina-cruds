<main style="margin-left: 200px;">
    <div class="container" style="margin-top: 20px;">
        <h3 class="center-align">Listado de departamentos</h3>
        <a href="<?= base_url('departamento/register') ?>" class="btn btn-danger">Nuevo</a>
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
                    <th>Nombre</th>
                    <th>Porcentaje</th>
                    <th class="center-align">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['nombre']) ?></td>
                        <td class="center-align"><?= esc($user['porcentaje_comision']) ?></td>
                        <td class="center-align">
                            <a href="<?= base_url('departamento/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue"> <i class="material-icons">edit</i></a>
                            <a href="<?= base_url('departamento/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red"> <i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>