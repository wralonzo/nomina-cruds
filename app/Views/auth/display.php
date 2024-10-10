<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <h3 class="center-align">Listado de Usuarios</h3>
        <a href="<?= base_url('auth/register') ?>" class="btn btn-danger">Nuevo usuario</a>
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
                    <th>Correo</th>
                    <th>Rol</th>
                    <th class="center-align">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td class="center-align"><?= esc($user['role']) ?></td>
                        <td class="center-align">
                            <a href="<?= base_url('auth/update/' . esc($user['id'])) ?>" class="btn waves-effect waves-light blue">Editar</a>
                            <a href="<?= base_url('auth/delete/' . esc($user['id'])) ?>" class="btn waves-effect waves-light red">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>