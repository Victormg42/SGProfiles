<?php
require_once 'users.php';
class UsersDao{
        private $pdo;
    public function __construct(){
        include '../model/connection.php';
        $this->pdo=$pdo;
    }

    public function login($user){
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $sentencia=$this->pdo->prepare($query);
        $email=$user->getEmail();
        $psswd=$user->getPassword();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$psswd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        if(!empty($numRow) && $numRow==1){
            $user->setEmail($result['email']);
            $user->setId($result['id']);
            $user->setProfile($result['profile']);
            $user->setStatus($result['status']);
            //Creamos la sesion
            session_start();
            $_SESSION['user']=$user;
            return true;
        }else {
            return false;
        }
    }   
}   
?>