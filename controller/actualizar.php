        <?php
            $id=$_GET['id'];
            $status=$_GET['status'];
            require_once '../model/postsDAO.php';
            $posts = new PostsDao();
            $posts->actualizar($id, $status);
        ?>