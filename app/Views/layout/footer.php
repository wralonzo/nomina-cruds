<!-- Sidenav for mobile -->
<ul class="sidenav" id="mobile-demo">
    <li><a href="#">Perfil</a></li>
    <li><a href="#">Cerrar sesión</a></li>
</ul>

<!-- Materialize JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    // Inicializar Sidenav
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
</script>

<script>
    $(document).ready(function() {
        // Inicializa el select de Materialize
        $('select').formSelect();
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
        // Inicializa DataTables
        $('#tableDatos').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": false, // Debe estar habilitado
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Todos"]
            ]
        });
    });
</script>
<script>
    // Inicializa los select de Materialize
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
</body>

</html>