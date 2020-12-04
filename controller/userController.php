<?php
// Incluimos los archivos de conexion y el sessionController
require_once '../model/connection.php';
require_once '../controller/sessionController.php';

// Recogemos el valor del puesto de trabajo desde la clase
$profile = $_SESSION['user']->getProfile();

if ($profile == '1') {
    header('Location: ../view/home.php');
} else if ($profile == '3') {
    header('Location: ../view/homeAdmin.php');
} else {
    header('Location: ../view/login.php');
}
?>