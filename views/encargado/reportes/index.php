<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Web</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/dashboard/gestion%20de%20ambientes/encargado/home">
            <img src="../../assets/img/login0.png" class="logo" style="width: 150px; height: auto; max-height: 50px;">
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        </a>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/dashboard/gestion%20de%20ambientes/login">Salir</a>
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
                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/encargado/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link" href="/dashboard/gestion%20de%20ambientes/inventario/listarEntradas">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Inventario
                        </a>

                        <a class="nav-link" href='/dashboard/gestion%20de%20ambientes/reporte/verReportesPorUsuario/'>
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Reporte
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Gestion de Inventarios Gafra</h1>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    $url_create = '/dashboard/gestion%20de%20ambientes/reporte/createReporte';
                                    ?>
                                    <a class="small text-white stretched-link" href="<?php echo $url_create; ?>"
                                        id="btn-create">Crear Nuevo Reporte</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Reporte</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaReportes" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Reporte</th>
                                            <th>Fecha y Hora</th>
                                            <th>Área</th>
                                            <th>Estado Reporte</th>
                                            <th>Fecha Solución</th>
                                            <th>Observaciones</th>
                                        </tr>
                                    <tbody>
                                        <?php foreach ($reportes as $reporte): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($reporte['Id_reporte']); ?></td>
                                                <td><?php echo htmlspecialchars($reporte['FechaHora']); ?></td>
                                                <td><?php echo htmlspecialchars($reporte['nombre_area']); ?></td>
                                                <td><?php echo $reporte['Estado_Reporte'] == 2 ? 'Confirmado' : 'Pendiente'; ?>
                                                </td>
                                                <td><?php echo !empty($reporte['Fecha_Solucion']) ? htmlspecialchars($reporte['Fecha_Solucion']) : 'Sin aprobar'; ?>
                                                </td>

                                                <td><?php echo htmlspecialchars($reporte['Observaciones']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </section>
                                <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                                    crossorigin="anonymous"></script>
                                <script
                                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
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
                                <!-- Bootstrap JS y dependencias de DataTables -->
                                <script
                                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                                <script
                                    src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
                                <script
                                    src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
                                <script
                                    src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                                <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
                                <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

                                <script>
                                    $(document).ready(function () {
                                        $('#tablaReportes').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copy', 'csv', 'excel', 'print'
                                            ],
                                            language: {
                                                url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                                            }
                                        });
                                    });
                                </script>

                                <script>

                                    function confirmarInhabilitar(id) {
                                        if (confirm("¿Estás seguro de que deseas inhabilitar esta área?")) {
                                            window.location.href = "inhabilitarAreaTrabajo/" + id;
                                        }
                                    }

                                    function confirmarHabilitar(id) {
                                        if (confirm("¿Estás seguro de que deseas habilitar esta área?")) {
                                            window.location.href = "habilitarAreaTrabajo/" + id;
                                        }
                                    }
                                </script>
</body>

</html>