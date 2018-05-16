<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado miembros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/Usuario.php";
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Agregar Miembro</h2>
            <form action="<?php echo Usuario::baseurl() ?>app/save.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="matricula">Matricula</label>
                    <input type="text" name="matricula" value="" class="form-control" id="matricula" placeholder="Matricula">
                </div>
                <div class="form-group">
                    <label for="carrera">Carrera</label>
                    <input type="text" name="carrera" value="" class="form-control" id="carrera" placeholder="Carrera">
                </div>
                <div class="form-group">
                    <label for="idproyecto">idProyecto</label>
                    <input type="text" name="idproyecto" value="" class="form-control" id="idproyecto" placeholder="idProyecto">
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Save miembro" />
            </form>
        </div>
    </div>
</body>
</html>
