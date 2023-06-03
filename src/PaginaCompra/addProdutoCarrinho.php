<?php
require "../dbConnection/queries.php";
session_start();
$idProduto = $_GET['idProduto'];
$idLoja = $_GET['idLoja'];

$carrinho = $_SESSION['carrinho'];
$_SESSION['addCarrinho'] = 1;

$arrayProduto = selectProdutoById($idProduto,$idLoja);
array_push($carrinho,...$arrayProduto);


header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja)

?>