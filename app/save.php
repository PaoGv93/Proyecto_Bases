<?php
	require_once "../models/Usuario.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
	      exit;
	}

	$args = array(
		'nombre'  => FILTER_SANITIZE_STRING,
		'password'  => FILTER_SANITIZE_STRING,
		'matricula'  => FILTER_SANITIZE_STRING,
		'carrera'  => FILTER_SANITIZE_STRING,
		'idproyecto'  => FILTER_SANITIZE_STRING,
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	$db = new Database; //crea nueva conexion
	$user = new Usuario($db);
	$user->setNombre($post->nombre);
	$user->setPassword($post->password);
	$user->setMatricula($post->matricula);
	$user->setCarrera($post->carrera);
	$user->setProyecto($post->idproyecto);
	$user->save();
	header("Location:" . Usuario::baseurl() . "app/listUsuario.php");

?>
