<?php
require "../dbConnection/queries.php";

$idLoja = $_GET['idLoja'];
$idProduto = $_GET['idProduto'];

$result = removeProduct($idProduto,$idLoja);

if($result){
    header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja);
} else{
    echo 'Não foi possível realizar a sua query';
}


?>