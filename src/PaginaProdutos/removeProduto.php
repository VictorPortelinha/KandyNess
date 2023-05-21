<?php
require "../dbConnection/queries.php";

$idLoja = $_GET['idLoja'];
$idProduto = $_GET['idProduto'];

$result = removeProduct($idProduto,$idLoja);

if($result){
    echo 'Query realizada com sucesso';
} else{
    echo 'Não foi possível realizar a sua query';
}


?>