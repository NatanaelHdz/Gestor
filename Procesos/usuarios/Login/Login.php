<?php
	session_start();
	require_once "../../../Clases/Usuario.php";

	$usuario= $_POST['login'];
	$password= sha1($_POST['password']);

	$usuarioObj = new Usuario();

	echo $usuarioObj->login($usuario, $password);

?>