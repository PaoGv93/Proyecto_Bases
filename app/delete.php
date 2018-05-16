<?php
	require_once "../models/Usuario.php";
	$db = new Database;
	$user = new Usuario($db);
	$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);

	if( $id ){
		$user->setId($id);
		$user->delete();
	}
	header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
?>
