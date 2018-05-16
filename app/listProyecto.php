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
        <title>Listado de proyectos</title>
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
                <h2 class="text-center text-primary">Lista proyectos</h2>
                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="<?php echo Usuario::baseurl() ?>app/add.php">Add proyecto</a>
                </div>
                <?php
                if( ! empty( $users ) ) {
                ?>
                <table id="myTable" class="table table-striped">
                    <tr>

                        <th>IdProyecto</th>
                        <th>NombreProyecto</th>
                        <th>Alcance</th>
                        <th>Vision</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach( $users as $user )
                    {
                    ?>
                        <tr>
                            <td><?php echo $user->idproyecto ?></td>
                            <td><?php echo $user->nombreProyecto ?></td>
                            <td><?php echo $user->alcance ?></td>
                            <td><?php echo $user->vision ?></td>
                            <td><?php echo $user->fecha_Inicio ?></td>
                            <td><?php echo $user->fecha_Fin ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Usuario::baseurl() ?>app/edit.php?user=<?php echo $user->idProyecto ?>">Edit</a>
                                <a class="btn btn-info" href="<?php echo Usuario::baseurl() ?>app/delete.php?user=<?php echo $user->idProyecto ?>">Delete</a>
                                <a class="btn btn-info" href="listUsuario.php">Miembros</a>
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
                <div class="alert alert-danger" style="margin-top: 100px">There are 0 registered projets</div>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>
