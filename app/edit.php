<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de miembros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
        require_once "../models/Usuario.php";
        $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
        if( ! $id ){
            header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
        }
        $db = new Database;
        $newUser = new Usuario($db);
        $newUser->setId($id);
        $user = $newUser->get();
        $newUser->checkUser($user);
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Edit Usuario <?php echo $user->nombre ?></h2>
            <form action="<?php echo Usuario::baseurl() ?>app/update.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $user->nombre ?>" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $user->password ?>" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="matricula">Matricula</label>
                    <input type="text" name="matricula" value="<?php echo $user->matricula ?>" class="form-control" id="matricula" placeholder="Matricula">
                </div>
                <div class="form-group">
                    <label for="carrera">Carrera</label>
                    <input type="text" name="carrera" value="<?php echo $user->carrera ?>" class="form-control" id="carrera" placeholder="Carrera">
                </div>
                <div class="form-group">
                    <label for="idproyecto">idProyecto</label>
                    <input type="text" name="idproyecto" value="<?php echo $user->idproyecto ?>" class="form-control" id="idproyecto" placeholder="idProyecto">
                </div>
                <input type="hidden" name="id" value="<?php echo $user->id ?>" />
                <input type="submit" name="submit" class="btn btn-default" value="Update miembro" />
            </form>
        </div>
    </div>
</body>
</html>
