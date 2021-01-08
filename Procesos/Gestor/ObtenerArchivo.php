<?php 

	session_start();
	require_once "../../Clases/Gestor.php";
	$Gestor=new Gestor();
	$idArchivo=$_POST['idArchivo'];


	echo $Gestor->obtenerRutaArchivo($idArchivo);



 ?>