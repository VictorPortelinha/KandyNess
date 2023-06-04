<?php
require "../dbConnection/queries.php";
session_start();
$idProduto = $_GET['idProduto'];
$idLoja = $_GET['idLoja'];


$_SESSION['addCarrinho'] = 1;
$arrayProduto = array($idProduto,$idLoja);
array_push($_SESSION['carrinho'],$arrayProduto);


print_r($_SESSION['carrinho']);

//header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja)

?>