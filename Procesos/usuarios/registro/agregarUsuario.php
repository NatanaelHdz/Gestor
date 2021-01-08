<?php

	require_once "../../../Clases/Usuario.php";
	$password=sha1($_POST['password']);
	$fechaNacimiento=explode("-",$_POST['fechadeNacimiento']);
	$fechaNacimiento= $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
	$datos =array(
	    "nombre"=>$_POST['nombre'],
	    "fechaNacimiento"=>$fechaNacimiento,
	    "email"=> $_POST['email'],
	    "usuario"=> $_POST['usuario'],
	    "password" => $password
	);

	$usuario = new Usuario();
	echo $usuario->agragarUsuario($datos);

?>