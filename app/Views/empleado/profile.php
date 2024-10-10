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
                <span class="card-title">Esposa</span>
                <table class="highlight tableData">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado civil</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                <td class="center-align">

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
                            <th>Estado civil</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                <td class="center-align">

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br><br>
                <span class="card-title">Documentos</span>
                <table class="highlight tableData">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado civil</th>
                            <th class="center-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                <td class="center-align">

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
                                    <th>Nombre</th>
                                    <th>Estado civil</th>
                                    <th class="center-align">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                        <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                        <td class="center-align">

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
                                    <th class="center-align">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                        <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                        <td class="center-align">

                                        </td>
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
                        <table class="highlight tableData">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Estado civil</th>
                                    <th class="center-align">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                        <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                        <td class="center-align">

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
                                    <th>Nombre</th>
                                    <th>Estado civil</th>
                                    <th class="center-align">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['nombres']) . ' ' . esc($user['apellidos']) ?></td>
                                        <td class="center-align"><?= esc($user['estadocivil']) ?></td>
                                        <td class="center-align">

                                        </td>
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