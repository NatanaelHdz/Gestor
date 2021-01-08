<?php 

	require_once "../../Clases/Categoria.php";

	$Categoria = new Categorias();

	$datos = array(
		"idCategoria" => $_POST['idCategoria'],
		"categoria" => $_POST['categoriaU']
	);

	echo $Categoria->actualizarCategoria($datos);

 ?>