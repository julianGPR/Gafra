<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Area</title>
    <link rel="stylesheet" type="text/css" href="../../assets/styles.css">
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="../../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
    </div>
    <div class="title">
        <h1>Editar Area</h1>
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
<section class="update-ambiente" id="section-update-ambiente">
    <form id="updateAmbienteForm" action="../updateAreaTrabajo/<?php echo $areaTrabajo['id_area']; ?>" method="POST">

    <fieldset>
            <legend>Editar Área de Trabajo</legend>

            <label for="nombre_area">Nombre del Área:</label><br>
            <input type="text" id="nombre_area" name="nombre_area" value="<?php echo isset($ambiente['nombre_area']) ? $ambiente['nombre_area'] : ''; ?>" required><br><br>

            <label for="capacidad">Capacidad:</label><br>
            <input type="number" id="capacidad" name="capacidad" value="<?php echo isset($ambiente['capacidad']) ? $ambiente['capacidad'] : ''; ?>" required><br><br>

            <label for="ubicacion">Ubicación:</label><br>
            <input type="text" id="ubicacion" name="ubicacion" value="<?php echo isset($ambiente['ubicacion']) ? $ambiente['ubicacion'] : ''; ?>" required><br><br>

            <label for="responsable">Responsable:</label><br>
            <input type="text" id="responsable" name="responsable" value="<?php echo isset($ambiente['responsable']) ? $ambiente['responsable'] : ''; ?>" required><br><br>

            <label for="tipo_area">Tipo de Área:</label><br>
            <select id="tipo_area" name="tipo_area" required>
                <option value="Tuberia" <?php if(isset($ambiente['tipo_area']) && $ambiente['tipo_area'] === 'Tuberia') echo 'selected'; ?>>Tubería</option>
                <option value="Ensamble" <?php if(isset($ambiente['tipo_area']) && $ambiente['tipo_area'] === 'Ensamble') echo 'selected'; ?>>Ensamble</option>
                <option value="Corte" <?php if(isset($ambiente['tipo_area']) && $ambiente['tipo_area'] === 'Corte') echo 'selected'; ?>>Corte</option>
                <option value="Satelite" <?php if(isset($ambiente['tipo_area']) && $ambiente['tipo_area'] === 'Satelite') echo 'selected'; ?>>Satélite</option>
            </select><br><br>

            <label for="equipo_disponible">Equipo Disponible:</label><br>
            <input type="text" id="equipo_disponible" name="equipo_disponible" value="<?php echo isset($ambiente['equipo_disponible']) ? $ambiente['equipo_disponible'] : ''; ?>" required><br><br>

            <label for="estado_area">Estado del Área:</label><br>
            <input type="text" id="estado_area" name="estado_area" value="<?php echo isset($ambiente['estado_area']) ? $ambiente['estado_area'] : ''; ?>" required><br><br>

            <label for="fecha_creacion">Fecha de Creación:</label><br>
            <input type="date" id="fecha_creacion" name="fecha_creacion" value="<?php echo isset($ambiente['fecha_creacion']) ? $ambiente['fecha_creacion'] : ''; ?>"><br><br>

            <label for="comentarios">Comentarios:</label><br>
            <textarea id="comentarios" name="comentarios" rows="4" cols="50"><?php echo isset($ambiente['comentarios']) ? $ambiente['comentarios'] : ''; ?></textarea><br><br>

            <button type="submit">Guardar Cambios</button>
        </fieldset>
    </form>
</section>

<footer>
    <p>Sena todos los derechos reservados</p>
</footer>
<div class="regresar">
    <?php
    $url_regresar = '../areaTrabajo';
    ?>
    <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
</div>
<div class="salir">
    <button id="btn_salir">Salir</button>
</div>
<script>
document.getElementById('updateAmbienteForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    // Enviar solicitud al servidor
    fetch('../updateAreaTrabajo/<?php echo $ambiente['id_area']; ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Mostrar alerta de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El Área de Trabajo ha sido modificada exitosamente',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../areaTrabajo';
            });
        } else {
            // Mostrar alerta de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo modificar el Área de Trabajo. Por favor, intenta de nuevo',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Mostrar alerta de error de conexión
        Swal.fire({
            icon: 'error',
            title: 'Error de conexión',
            text: 'Hubo un problema al intentar modificar el Área de Trabajo',
            confirmButtonText: 'OK'
        });
    });
});
</script>
</body>
</html>
