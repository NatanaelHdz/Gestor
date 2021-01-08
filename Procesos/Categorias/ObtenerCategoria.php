<?php

    require_once "../../Clases/Categoria.php";
    $Categoria = new Categorias();

    echo json_encode($Categoria->obtenerCategoria($_POST['idCategoria']));


?>