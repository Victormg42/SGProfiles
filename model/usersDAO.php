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
            //Creamos la sesion
            session_start();
            $_SESSION['user']=$user;
            return true;
        }else {
            return false;
        }
    }

    public function insertar(){
        include '../model/connection.php';
        try {
        //Comienza la transacción
        $pdo->beginTransaction(); 
        $query="INSERT INTO `users` (`id`, `name`, `surname` , `email`, `password`, `status`, `profile`) VALUES (NULL,?,?,?,?,'1','1');";
        $sentencia=$pdo->prepare($query);
        $nom=$_POST['nombre'];
        $ape=$_POST['apellido']; 
        $email=$_POST['email']; 
        $pass=md5($_POST['password']);
        $sentencia->bindParam(1,$nom);
        $sentencia->bindParam(2,$ape);
        $sentencia->bindParam(3,$email);
        $sentencia->bindParam(4,$pass);
        $sentencia->execute();
            echo "todo bien";
            //hacer todas las sentencias a la vez
            $pdo->commit();
            header("Location: ../view/login.php");
        } catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $pdo->rollback();
            echo $ex->getMessage();
           
        }
    }    
}   
?>