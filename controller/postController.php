<?php
require_once '../model/connection.php';
$title = $_POST['title'];
$path = 'public/'.$_FILES['img']['name'];
if (move_uploaded_file($_FILES['img']['tmp_name'], '../'.$path)) {
    /* el ID del user se ha de colocar de manera correcta y no de manera hardcodeada */
    $query = "INSERT INTO posts (title, path, user) VALUES(?,?,'1')";
    $sentencia = $pdo->prepare($query);
    $sentencia->bindParam(1,$title);
    $sentencia->bindParam(2,$path);
    $sentencia->execute();
    header("Location: ../view/home.php");
}