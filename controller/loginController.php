<?php
// Incluimos la clase user y userDAO que es donde esta la funcion del login
include '../model/users.php';
include '../model/usersDAO.php';
// La contraseña encriptada en md5, que la vamos a buscar en la base de datos.
    $pass = md5($_POST['password']);

// Vamos a controlar que al introducir usuario nos rediriga a otra pagina que nos permita controlar que usuario inicia sesion en la pagina userController //
        $user = new Users($_POST['email'], $pass);
        $userDAO = new UsersDAO();
        if($userDAO->login($user)){
            header('Location: ../controller/userController.php');
        } else {
            header('Location: ../view/login.php');
        }
?>
