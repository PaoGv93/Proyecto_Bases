<?php
 //entry.php
 session_start();
 if(!isset($_SESSION["username"]))
 {
      header("location:index.php?action=login");
 }
 ?>
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listado de usuarios</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
        <script>
          function goBack() {
              window.history.back()
          }
        </script>
    </head>
    <body>
        <?php
            require_once "../models/Usuario.php";
            $db = new Database;
            $user = new Usuario($db);
            $users = $user->get();
        ?>

        <nav class="fh5co-nav" role="navigation">
      		<div class="container">
            <br>
            <button class="btn btn-secondary" onclick="goBack()">Go Back</button>

      			<div class="pull-right">
      				<a class="btn btn-secondary" role="button" href="<?php echo Usuario::baseurl() ?>app/logout.php">logout</a>
      			</div>
      		</div>
      	</nav>
        <div class="container">
          <br>
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Lista miembros</h2>
                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="<?php echo Usuario::baseurl() ?>app/add.php">Add miembro</a>
                </div>
                <?php
                if( ! empty( $users ) ) {
                ?>
                <table id="myTable" class="table table-striped">
                    <tr>

                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Matricula</th>
                        <th>Carrera</th>
                        <th>idProyecto</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach( $users as $user )
                    {
                    ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->nombre ?></td>
                            <td><?php echo $user->matricula ?></td>
                            <td><?php echo $user->carrera ?></td>
                            <td><?php echo $user->idproyecto ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Usuario::baseurl() ?>app/edit.php?user=<?php echo $user->id ?>">Edit</a>
                                <a class="btn btn-info" href="<?php echo Usuario::baseurl() ?>app/delete.php?user=<?php echo $user->id ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <?php
                }
                else
                {
                ?>
                <div class="alert alert-danger" style="margin-top: 100px">There are 0 registered members</div>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>
