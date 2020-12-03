<?php
// Incluimos la clase user y userDAO que es donde esta la funcion del login
include '../model/users.php';
include '../model/usersDAO.php';
// La contraseña es 1234 y la encriptada 81CMbBg2r.GBA (esta hay que ponerla en la base de datos) //
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
