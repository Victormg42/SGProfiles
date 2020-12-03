<?php
// En el logout iniciamos la sesion, la destruimos y redirigimos de nuevo al login
session_start();
session_destroy();
header('Location:../view/login.php');
?>