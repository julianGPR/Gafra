<?php
<<<<<<< HEAD
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
=======
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
        </div>
        <div class="title">
            <h1>Gestion de Ambientes de formacion</h1>
        </div>
        <div class="datetime">
            <?php
                date_default_timezone_set('America/Bogota');
                $fechaActual = date("d/m/Y");
                $horaActual = date("h:i a");
            ?>
            <div class="datetime">
                <div class="fecha">
                    <p>Fecha actual: <?php echo $fechaActual; ?></p>
                </div>
                <div class="hora">
                    <p>Hora actual: <?php echo $horaActual; ?></p>
                </div>
            </div>
        </div>
    </header>
    <nav>
<<<<<<< HEAD
    <div>
        <button class="toggle-vis" data-column="0">Id</button>
        <button class="toggle-vis" data-column="0">Nombre</button>
        <button class="toggle-vis" data-column="1">Torre</button>
        <button class="toggle-vis" data-column="2">Computadores</button>
        <button class="toggle-vis" data-column="3">Tvs</button>
        <button class="toggle-vis" data-column="4">Sillas</button>
        <button class="toggle-vis" data-column="5">Mesas</button>
        <button class="toggle-vis" data-column="6">Tableros</button>
        <button class="toggle-vis" data-column="7">Niñeras</button>
        <button class="toggle-vis" data-column="8">Accion</button>
    </div>
    </nav>
=======
        <div class="filtro-y-crear">
            <div class="filtro">
                <label for="filtro_ambiente">Buscar Ambiente:</label>
                <input type="text" id="filtro_ambiente" name="filtro_ambiente">
            </div>
            <div class="crear-ambiente">
                <ul>
                    <?php
                    // Construir la URL adecuada para el botón de "Gestión de Ambientes"
                    $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAmbiente/' ; // Corregir la construcción de la URL
                    ?>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Ambiente</a></li>
                </ul>
            </div>
        </div>
    </nav>  
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Ambientes</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de ambientes de formación</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
<<<<<<< HEAD
    <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Torre</th>
                    <th>Computadores</th>
                    <th>Tvs</th>
                    <th>Sillas</th>
                    <th>Mesas</th>
                    <th>Tableros</th>
                    <th>Niñeras</th>
                    <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM t_ambientes";

                    if (!empty($filtros)) {
                        $query .= " WHERE " . implode(" AND ", $filtros);
                    }

                    $result = $db->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Id_ambiente'] . "</td>";
                            echo "<td>" . $row['Nombre'] . "</td>";
                            echo "<td>" . $row['Torre'] . "</td>";
                            echo "<td>" . $row['Computadores'] . "</td>";
                            echo "<td>" . $row['Tvs'] . "</td>";
                            echo "<td>" . $row['Sillas'] . "</td>";
                            echo "<td>" . $row['Mesas'] . "</td>";
                            echo "<td>" . $row['Tableros'] . "</td>";
                            echo "<td>" . $row['Nineras'] . "</td>";
                            echo "<td>";
                            if ($row['Estado'] !== 'Inhabilitado') {
                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAmbiente/';
                                echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";

                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
                                echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-generar-qr' boton-accion ><img src='../assets/qr-code.svg'></a>";
                            } else {
                                echo "<a href='#' onclick='confirmarHabilitar(" . $row['Id_ambiente'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
                            }
                            if ($row['Estado'] !== 'Inhabilitado') {
                                echo "<a href='#' onclick='confirmarInhabilitar(" . $row['Id_ambiente'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No hay registros</td></tr>";
                    }

                    $db->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="filtro-y-crear">
            <div class="crear-ambiente">
                <?php
                $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAmbiente/';
                ?>
                <ul>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Ambiente</a></li>
                </ul>
            </div>
        </div>
=======
            <table border="1" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Computadores</th>
                        <th>TV</th>
                        <th>Sillas</th>
                        <th>Mesas</th>
                        <th>Tablero</th>
                        <th>Archivador</th>
                        <th>Infraestructura</th>
                        <th>Observación</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Consulta SQL para seleccionar todos los registros de la tabla t_ambientes
$query = "SELECT * FROM t_ambientes";
$result = $db->query($query);

if ($result->num_rows > 0) {
    // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Id_ambiente'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['Computadores'] . "</td>";
        echo "<td>" . $row['Tv'] . "</td>";
        echo "<td>" . $row['Sillas'] . "</td>";
        echo "<td>" . $row['Mesas'] . "</td>";
        echo "<td>" . $row['Tablero'] . "</td>";
        echo "<td>" . $row['Archivador'] . "</td>";
        echo "<td>" . $row['Infraestructura'] . "</td>";
        echo "<td>" . $row['Observacion'] . "</td>";
        echo "<td>";
        if ($row['Estado'] !== 'Inhabilitado') {
            $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAmbiente/';
            echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
            $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
            echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-generar-qr'>Generar QR</a>";
        } else {
            // Si el ambiente está inhabilitado, mostrar el botón de habilitar
            echo "<a href='#' onclick='confirmarHabilitar(" . $row['Id_ambiente'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
        }
        if ($row['Estado'] !== 'Inhabilitado') {
            echo "<a href='#' onclick='confirmarInhabilitar(" . $row['Id_ambiente'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
        }
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
    echo "<tr><td colspan='10'>No hay registros</td></tr>";
}

// Cerrar la conexión a la base de datos
$db->close();
?>

                </tbody>
            </table>
        </div>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
        <div class="regresar">
            <?php
                $url_regresar = 'home';
            ?>
<<<<<<< HEAD
            <a href="<?php echo $url_regresar; ?>"class="button boton-centrado" id="btn-regresar">Regresar</a>
=======
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </section>
    <script>
<<<<<<< HEAD
    $(document).ready(function() {
        var table = $('#tabla-ambientes').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            paging: true,
            pageLength: 10
        });

        // Escuchar eventos de clic en los botones de mostrar/ocultar columnas
        $('button.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Obtener el índice de la columna desde el atributo data-column del botón
            var columnIdx = $(this).attr('data-column');

            // Alternar la visibilidad de la columna
            table.column(columnIdx).visible(!table.column(columnIdx).visible());
        });
    });
</script>
 <script>
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
    function confirmarInhabilitar(id) {
        if (confirm("¿Estás seguro de que deseas inhabilitar este ambiente?")) {
            window.location.href = "inhabilitarAmbiente/" + id;
        }
    }
    function confirmarHabilitar(id) {
        if (confirm("¿Estás seguro de que deseas habilitar este ambiente?")) {
            window.location.href = "habilitarAmbiente/" + id;
        }
    }
</script>
<<<<<<< HEAD

=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
</body>
</html>
<<<<<<< HEAD

=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
