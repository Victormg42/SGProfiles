        <?php
        //Pasamos por el GET el id y el status del usuario, ya que los vamos a utilizar para llamar a la función que se encuentra en postsDAO.
            $id=$_GET['id'];
            $status=$_GET['status'];
            require_once '../model/postsDAO.php';
            $posts = new PostsDao();
            $posts->actualizar($id, $status);
        ?>