<?php

include_once 'models/InstructorModel.php';

class InstructorController {

    public function home() {
        include 'views/instructor/index.php';
    }

    public function readQR($id) {
        $qr_content = $id;
    
        $instructorModel = new InstructorModel();
        $result = $instructorModel->leerQR($qr_content);
    
        if ($result) {
            $nombre = htmlspecialchars($result[0]["nombre_area"]); // Tomamos el nombre del primer resultado
            $computadores = array_map(function($item) {
                return [
                    'Serial' => $item['SerialComputador'],
                    'Marca' => $item['MarcaComputador'],
                    'Modelo' => $item['ModeloComputador'],
                    'CheckPc' => $item['CheckPc']
                ];
            }, $result); // Obtenemos un array con los números de serie, la marca, el modelo y el estado de CheckPcs

            $capacidad = htmlspecialchars($result[0]["capacidad"]);
            $ubicacion = htmlspecialchars($result[0]["ubicacion"]);
            $responsable = htmlspecialchars($result[0]["responsable"]);
            $tipo_area = htmlspecialchars($result[0]["tipo_area"]);
            $equipo_disponible = htmlspecialchars($result[0]["equipo_disponible"]);
            $estado_area = htmlspecialchars($result[0]["estado_area"]);
            $fecha_creacion = htmlspecialchars($result[0]["fecha_creacion"]);
            $comentarios = htmlspecialchars($result[0]["comentarios"]);

            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("d/m/Y");
            $hora_actual = date("H:i");
    
            include 'views/instructor/reportes/index.php';
        } else {
            echo "No se encontró información relacionada para el código QR escaneado.";
        }
    }
    
    }

?>
