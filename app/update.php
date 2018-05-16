<?php
	require_once "../models/Usuario.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
	      exit;
	}
	$args = array(
		'id'  => FILTER_SANITIZE_STRING,
		'nombre'  => FILTER_SANITIZE_STRING,
		'password'  => FILTER_SANITIZE_STRING,
		'matricula'  => FILTER_SANITIZE_STRING,
		'carrera'  => FILTER_SANITIZE_STRING,
		'idproyecto'  => FILTER_SANITIZE_STRING,
	);

	$post = (object)filter_input_array(INPUT_POST, $args);

	if( $post->id === false ){
	    header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
	}

	$db = new Database;
	$user = new Usuario($db);
	$user->setId($post->id);
	$user->setNombre($post->nombre);
	$user->setPassword($post->password);
	$user->setMatricula($post->matricula);
	$user->setCarrera($post->carrera);
	$user->setProyecto($post->idproyecto);
	$user->update();
	header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
?>
