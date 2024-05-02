<?php

include_once 'models/AdminModel.php';

class AdminController {
    public function home() {
        include 'views/administrador/index.php';
    }
    
    public function ambientes() {
        include 'views/administrador/ambientes/index.php';
    }

    public function usuarios() {
        include 'views/administrador/usuarios/index.php';
    }

    public function createAmbiente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $computadores = $_POST["computadores"];
            $tv = $_POST["tv"];
            $sillas = $_POST["sillas"];
            $mesas = $_POST["mesas"];
            $tablero = $_POST["tablero"];
            $archivador = $_POST["archivador"];
            $infraestructura = $_POST["infraestructura"];
            $observacion = $_POST["observacion"];

            $adminModel = new AdminModel();
            $result = $adminModel->guardarAmbiente($nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion);

            if ($result) {
                // Lógica para generar el contenido del QR
                $contenido_qr = "Nombre: $nombre\nComputadores: $computadores\nTV: $tv\nSillas: $sillas\nMesas: $mesas\nTablero: $tablero\nArchivador: $archivador\nInfraestructura: $infraestructura\nObservación: $observacion";

                // Lógica para generar el código QR
                $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr) .'&rand=' . uniqid();

                header("Location: ../ambientes");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el ambiente");
                exit();
            }
        } else {
            include 'views/administrador/ambientes/create.php';
        }
    }

    public function updateAmbiente($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $computadores = $_POST["computadores"];
            $tv = $_POST["tv"];
            $sillas = $_POST["sillas"];
            $mesas = $_POST["mesas"];
            $tablero = $_POST["tablero"];
            $archivador = $_POST["archivador"];
            $infraestructura = $_POST["infraestructura"];
            $observacion = $_POST["observacion"];
    
            $adminModel = new AdminModel();
            $result = $adminModel->modificarAmbiente($id, $nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion);
    
            if ($result) {
                header("Location: ../ambientes");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el ambiente&id=$id");
                exit();
            }
        } else {
            $adminModel = new AdminModel();
            $ambiente = $adminModel->obtenerAmbientePorId($id);
            include 'views/administrador/ambientes/update.php';
        }
    }

    public function inhabilitarAmbiente($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->inhabilitarAmbiente($id);

        if ($result) {
            echo "<script>alert('Ambiente inhabilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al inhabilitar el ambiente');</script>";
        }
        
        header("Location: ../ambientes");
        exit();
    }

    public function habilitarAmbiente($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->habilitarAmbiente($id);
    
        if ($result) {
            echo "<script>alert('Ambiente habilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al habilitar el ambiente');</script>";
        }
        
        header("Location: ../ambientes");
        exit();
    }

    public function createUsuario(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo = $_POST["correo"];
            $pin = $_POST["pin"];
            $rol = $_POST["Rol"];

            $adminModel = new AdminModel();
            $result = $adminModel->guardarUsuario($nombres, $apellidos, $correo, $pin, $rol);

            if ($result) {
                header("Location: ../usuarios");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el usuario");
                exit();
            }
        } else {
            include 'views/administrador/usuarios/create.php';
        }

    }

    public function updateUsuario($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo = $_POST["correo"];
            $pin = $_POST["pin"];
            $rol = $_POST["Rol"];
    
            $adminModel = new AdminModel();
            $result = $adminModel->modificarUsuario($id, $nombres, $apellidos, $correo, $pin, $rol);
    
            if ($result) {
                header("Location: ../usuarios");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el usuario&id=$id");
                exit();
            }
        } else {
            $adminModel = new AdminModel();
            $usuario = $adminModel->obtenerUsuarioPorId($id);
            include 'views/administrador/usuarios/update.php';
        }
    }


    public function reportes() {
        include 'views/administrador/reportes/index.php';
    }

    public function generateQR($id) {
        $id_ambiente = $id;

        $contenido_qr = $id_ambiente;

        $qrCodeAPIURL = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($contenido_qr);

        // Muestra el QR en la página
        echo "<img src='" . $qrCodeAPIURL . "' alt='QR Code'>";

    }


    public function enviarInforme() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["observacion"])) {
            // Obtener los datos del formulario
            $observacion = $_POST["observacion"];
            $id_usuario = $_SESSION["id_usuario"]; // Obtener el ID del usuario de la sesión
            $id_ambiente = $_POST["id_ambiente"]; // Obtener el ID del ambiente del formulario
    
            // Llamar al método para agregar el informe en el modelo
            $this->agregarReporte($observacion, $id_usuario, $id_ambiente);
            // Redirigir al instructor a alguna página
            header("Location: ../home");
            exit();
        } else {
            // Manejar el caso en que no se haya enviado un formulario POST
            echo "Error: Método de solicitud incorrecto.";
        }
    }
    
    public function agregarReporte($observacion, $id_usuario, $id_ambiente) {
        $adminModel = new AdminModel();
        $result = $adminModel->insertarReporte($observacion, $id_usuario, $id_ambiente);
        if ($result) {
            // Redireccionar de vuelta a la página de reportes del instructor
            header("Location: ../reportes");
            exit();
        } else {
            // Manejar el caso en que ocurra un error al agregar el reporte
            echo "<script>alert('Error al agregar el reporte');</script>";
            exit();
        }
    }
    
}

?>
