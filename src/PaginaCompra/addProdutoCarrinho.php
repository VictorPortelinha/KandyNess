<?php
require "../dbConnection/queries.php";
session_start();
$idProduto = $_GET['idProduto'];
$idLoja = $_GET['idLoja'];
$quantidade = 1;

$_SESSION['addCarrinho'] = 1;
$arrayProduto = array($idProduto,$idLoja,$quantidade);
array_push($_SESSION['carrinho'],$arrayProduto);




header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja)

?>