<?php
require "../dbConnection/queries.php";
if (isset($_POST)){
    $matricula = $_POST['matricula'];
    $nomeLoja = $_POST['nomeLoja'];
    $descLoja = $_POST['desc'];
    echo $matricula;
    
    $idLoja = selectIdDaLoja($matricula);

    $update = updateLoja($nomeLoja,$descLoja,$matricula,$idLoja);
    if(isset($update)){
        header("location:http://localhost/webProjects/KandyNess/src/PaginaVendedores/vendedores.php");
    }

}




?>
