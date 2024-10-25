<!-- Contenido Principal -->
<main style="margin-left: 300px;">
    <div class="container" style="margin-top: 20px;">
        <h4>Bienvenido al Dashboard</h4>
        <p>Aquí puedes gestionar tus datos y visualizar reportes.</p>

        <!-- Tarjetas de resumen -->
        <div class="row">
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Usuarios</span>
                        <p>Total: <?= $usuarios ?></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Empleados</span>
                        <p>Total: <?= $empleados ?></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Departamentos</span>
                        <p>Total generados: <?= $deptos ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>