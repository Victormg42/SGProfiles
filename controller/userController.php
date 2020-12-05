<?php
// Incluimos los archivos de conexion y el sessionController
require_once '../model/connection.php';
require_once '../controller/sessionController.php';

// Recogemos el valor del puesto de trabajo desde la clase
$profile = $_SESSION['user']->getProfile();
$status = $_SESSION['user']->getStatus();
if ($status == 0) {
    echo "El usuario esta bloqueado actualmente<br>";
    echo "<button><a style='text-decoration: none; color: black;' href='../view/login.php'>Volver</a></button>";
} else {
    if ($profile == '1') {
        header('Location: ../view/home.php');
    } else if ($profile == '3') {
        header('Location: ../view/homeAdmin.php');
    } else {
        header('Location: ../view/login.php');
    }   
}
?>