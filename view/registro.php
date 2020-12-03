<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="../js/code.js"></script>
    <title>Registro</title>
</head>
<body>
<div class="login" style="margin: 60px auto;">
  <h2 class="login-header">Registrarse</h2>
    <form class="login-container" action="registro.php" method="POST">
        <p><input type="text" id="nombre" name="nombre" placeholder="Nombre..."></p>

        <p><input type="text" id="apellido" name="apellido" placeholder="Apellido.."></p>

        <p><input type="email" id="email" name="email" placeholder="Email.."></p>

        <p><input type="password" id="password" name="password" placeholder="Password.."></p>

        <p><input type="password" id="password1" name="password1" placeholder="Repite password.."></p>
    
        <input type="submit" value="Crear Cuenta" name="submit">
  </form>
</div>

  <?php
  if (isset($_POST['submit'])){
    require_once '../model/usersDAO.php';
    $users = new UsersDao();
    $users->insertar();
  }
  ?>

</body>
</html>