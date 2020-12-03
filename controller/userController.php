<?php
// Incluimos los archivos de conexion y el sessionController
require_once '../model/connection.php';
require_once '../controller/sessionController.php';

// Recogemos el valor del puesto de trabajo desde la clase
$status = $_SESSION['user']->getStatus();

if ($status == 1) {
    header('Location: ../view/home.html');
} else if ($status == 3) {
    header('Location: ../view/home.html');
} else {
    print_r($status);
    //header('Location: ../view/login.php');
}
?>