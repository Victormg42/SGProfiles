<?php
// Utilizamos la clase Usuario para llegar hasta la funcion del login //
require_once '../model/users.php';
// Si la sesion no esta seteada, entonces volvemos al login para que el usuario se pueda loguear de nuevo.
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../view/login.php');
}
// Mostramos por pantalla el botón del Logout que nos permitirá desconectarnos y volver al login. Así como el mensaje de bienvenida al usuario. //
?>