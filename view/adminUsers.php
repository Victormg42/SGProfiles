<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Social Gallery</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/code.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/3c4c2142b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<?php
include '../controller/sessionController.php';
?>
<body>
    <!--Menu de navegación-->
    <ul>
        <li><a><?php echo $_SESSION['user']->getEmail() ?></a></li>
        <li><a onclick="openModal()">+</a></li>
        <li><a href="../view/login.php">logout</a></li>
    </ul>
        <?php
            require_once '../model/postsDAO.php';
            $posts = new PostsDao();
            $posts->mostrarUsuarios();
        ?>
</body>

</html>