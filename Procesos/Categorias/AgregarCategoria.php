<?php
    session_start();

    require_once "../../Clases/Categoria.php";
    $Categoria = new Categorias();


    $datos = array(
        "idUsuario"=>$_SESSION['idUsuario'],
        "categoria"=>$_POST['categoria']
    );

    echo $Categoria->agregarCategoria($datos);



?>