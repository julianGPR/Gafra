<?php
// Verificar si la actualización fue exitosa mediante el parámetro GET 'success'
if (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
    <script>
        alert("Usuario actualizado exitosamente");
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Web</title>
    <link rel="icon" href="../../assets/img/login02.ico" type="image/x-icon">
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }

    /* Estilo personalizado para el pie de la barra lateral */
    .custom-footer {
        background-color: #1D4A86!important;
        /* Fondo azul personalizado */
        color: #C4C4C4 !important;
        /* Texto en color claro */
        padding: 10px;
        text-align: center;
    }

    .custom-footer .small {
        color: #C4C4C4 !important;
        /* Color del texto pequeño */
        font-size: 0.85rem !important;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-blue "
        style="background: linear-gradient(20deg,  #C4C4C4, #C4C4C4);">
        <?php
        $url_regresar = '../../admin/home';
        ?>
        <a class="navbar-brand" href="<?php echo $url_regresar; ?>">
            <img src="../../assets/img/login0.png" class="logo" style="width: 150px; height: auto; max-height: 50px;">
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- Notificaciones en el menú de la campana -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Contador de alertas -->
                    <span class="badge badge-danger badge-counter">
                        <?php
                        $conn = Database::connect();
                        $sql = "SELECT COUNT(*) AS total FROM t_reportes WHERE Estado = '1'";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            echo $row['total'] > 0 ? $row['total'] : '';
                        } else {
                            echo "0";
                        }
                        ?>
                    </span>
                </a>

                <!-- Dropdown - Alertas -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>

                    <?php
                    // Consulta para obtener las notificaciones no vistas
                    $query = "SELECT r.*, u.Nombres AS nombre_usuario, u.Apellidos AS apellido_usuario, a.nombre_area 
                  FROM t_reportes r 
                  INNER JOIN t_usuarios u ON r.Id_usuario = u.Id_usuario 
                  INNER JOIN AreaTrabajo a ON r.Id_area = a.Id_area 
                  WHERE r.estado = 1";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<a class='dropdown-item d-flex align-items-center' href='#'>";
                            echo "<div class='mr-3'>";
                            echo "<div class='icon-circle bg-primary'>";
                            echo "<i class='fas fa-file-alt text-white'></i>";
                            echo "</div></div>";
                            echo "<div>";
                            echo "<div class='small text-gray-500'>" . date("F d, Y") . "</div>"; // Fecha del día actual
                            echo "<span class='font-weight-bold'>El Encargado " . $row['nombre_usuario'] . " " . $row['apellido_usuario'] .
                                " envió un reporte del área " . $row['nombre_area'] . "</span>";
                            echo "</div></a>";

                            // Marcar la notificación como vista
                            $reporte_id = $row['Id_reporte'];
                            $query_update = "UPDATE t_reportes SET Estado = 2 WHERE Id_reporte = $reporte_id";
                            $conn->query($query_update);
                        }
                    } else {
                        echo "<a class='dropdown-item text-center small text-gray-500' href='#'>No hay notificaciones nuevas</a>";
                    }

                    $conn->close();
                    ?>

                    <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
                </div>
            </li>

            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/gafra/usuarios/perfil">Configuración</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/gafra/login/logout">Salir</a>
                    </div>
                </li>
            </ul>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo $url_regresar; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/gafra/admin/areaTrabajo">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Area de trabajo
                        </a>

                        <a class="nav-link" href="/gafra/usuarios/usuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Gestión de Usuarios
                        </a>

                        <div class="nav-link d-flex align-items-center">
                            <a href="/gafra/reporte/reportes"
                                class="d-flex align-items-center custom-link">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                <span>Reportes</span>
                            </a>
                            <a href="#" class="ml-auto custom-link" data-toggle="collapse"
                                data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <i class="fas fa-angle-down"></i>
                            </a>
                        </div>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Tuberia">
                                    <i class="fas fa-toolbox"></i> Tubería
                                </a>
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Ensamble">
                                    <i class="fas fa-cogs"></i> Ensamble
                                </a>
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Corte">
                                    <i class="fas fa-cut"></i> Corte
                                </a>
                                <a class="nav-link custom-link"
                                    href="/gafra/reporte/verReporteAdministrador/Satelite">
                                    <i class="fas fa-satellite"></i> Satélite
                                </a>
                            </nav>
                        </div>



                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/gafra/proveedores/proveedores">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Proveedores
                        </a>

                        <a class="nav-link"
                            href="/gafra/inventario/listarEntradasAdministrador">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href="/gafra/Producto/listarProductos">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Productos
                        </a>
                        <a class="nav-link" href="/gafra/clientes/clientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                        </a>

                        <a class="nav-link" href="/gafra/facturas/index">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Ventas
                        </a>
                    </div>
                </div>
                <div class=" custom-footer">
                    <div class="small">Conectado como:</div>
                    Proyecto GAFRA
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f3f4f6;
                    }

                    .container {
                        max-width: 800px;
                        margin-top: 30px;
                    }

                    .header-title {
                        color: #1D4A86;
                        font-size: 1.8rem;
                        font-weight: bold;
                        display: flex;
                        align-items: center;
                        justify-content: left;
                        gap: 10px;
                        margin-bottom: 20px;
                    }

                    .form-label {
                        font-weight: 500;
                        color: #6b7280;
                    }

                    .form-control,
                    .form-select {
                        background-color: #f9fafb;
                        border: 1px solid #d1d5db;
                        border-radius: 4px;
                        color: #374151;
                    }

                    .btn-primary {
                        background-color: #6C63FF;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 20px;
                    }

                    .btn-secondary {
                        background-color: #e5e7eb;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 20px;
                        color: #374151;
                    }
                </style>
                </head>

                <body>

                    <div class="container">
                        <!-- Encabezado con ícono y título -->
                        <div class="header-title">
                            <i class="fas fa-truck"></i>
                            Editar Proveedor
                        </div>

                        <!-- Formulario de edición de proveedor -->
                        <form id="proveedorForm" action="../updateProveedor/<?php echo $id_proveedor; ?>"
                            method="POST" onsubmit="return showConfirmModal(event)">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre_proveedor" class="form-label"><i
                                            class="fas fa-building icon"></i> Nombre del proveedor</label>
                                    <input type="text" id="nombre_proveedor" name="nombre_proveedor"
                                        class="form-control"
                                        value="<?php echo isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="direccion" class="form-label"><i class="fas fa-map-marker-alt icon"></i>
                                        Dirección del proveedor</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control"
                                        value="<?php echo isset($proveedor['direccion']) ? $proveedor['direccion'] : ''; ?>"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="telefono" class="form-label"><i class="fas fa-phone icon"></i> Teléfono
                                        del proveedor</label>
                                    <input type="number" id="telefono" name="telefono" class="form-control"
                                        value="<?php echo isset($proveedor['telefono']) ? $proveedor['telefono'] : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label"><i class="fas fa-envelope icon"></i> Correo
                                        del proveedor</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="<?php echo isset($proveedor['email']) ? $proveedor['email'] : ''; ?>"
                                        required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
                                <a href="../proveedores" class="btn btn-secondary ms-2"><i
                                        class="fas fa-times-circle"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>

                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Acción</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea actualizar los cambios para este proveedor? Esta acción no se
                                    puede deshacer.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="submitForm()">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
                crossorigin="anonymous"></script>
            <script src="../../assets/Js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                crossorigin="anonymous"></script>
            <script src="../../assets/demo/chart-area-demo.js"></script>
            <script src="../../assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
                crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
                crossorigin="anonymous"></script>
            <script src="../../assets/demo/datatables-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                // Función para mostrar el modal de confirmación
                function showConfirmModal(event) {
                    event.preventDefault();
                    const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                    modal.show();
                }

                // Enviar el formulario después de la confirmación
                function submitForm() {
                    document.getElementById('proveedorForm').submit();
                }
            </script>

</body>

</html>