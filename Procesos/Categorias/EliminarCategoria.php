<?php

    session_start();
    require_once "../../Clases/Categoria.php";
     $Categoria = new  Categorias();
     echo $Categoria->eliminarCategoria($_POST['idCategoria']);   

?>