<?php
require_once 'posts.php';
class PostsDao{

    public function __construct(){
    }

    public function mostrar(){
        include '../model/connection.php';
        $query = "SELECT * FROM posts";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $id=-1;   
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($lista as $posts) {
        echo "<div class='three-column'>";
            if ($id==$posts['id']) {
                $id=-1;
                continue;
        } else {
            echo "<br>";
        }
            $id=$posts['id'];
            echo "<img src='../{$posts['path']}'>";
            echo "</div>";
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
            $pdo->commit();
            header("Location: ../view/login.php");
        } catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $pdo->rollback();
            echo $ex->getMessage();
        }
    }

    public function mostrarUsuarios(){
        include '../model/connection.php';
        $query = "SELECT * FROM users";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $id=-1;   
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<table style='width: 100%';>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Primer Apellido</th>";
                echo "<th>Segundo Apellido</th>";
                echo "<th>Estado</th>";
            echo "</tr>";
        foreach($lista as $usuario) {
        echo "<tr style='text-align: center';>";
            if ($id==$usuario['id']) {
                $id=-1;
                continue;
        } else {
            echo "<br>";
        }
            $id=$usuario['id'];
            echo "<td>{$usuario['name']}</td>";
            echo "<td>{$usuario['email']}</td>";
            echo "<td>{$usuario['profile']}</td>";
            $id=$usuario['id'];
            echo "</tr>";
        }
            echo "</table>";
    } 
}
?>