<?php 

	session_start();
	require_once "../../Clases/Gestor.php";
	$Gestor=new Gestor();
	$idArchivo=$_POST['idArchivo'];
	$idUsuario = $_SESSION['idUsuario'];
	
	$nombreArchivo = $Gestor->obtenNombreArchivo($idArchivo);

	$rutaEliminar = "../../Archivos/".$idUsuario."/".$nombreArchivo;

		if (unlink($rutaEliminar)) {
			echo $Gestor->eliminarRegistroArchivo($idArchivo);
		}else{
			echo 0;
		}


	

 ?>