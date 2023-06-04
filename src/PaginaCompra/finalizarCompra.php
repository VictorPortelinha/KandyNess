<?php
require "../dbConnection/queries.php";
session_start();

$carrinho = $_SESSION['carrinho'];

for($i = 0; $i < count($carrinho);$i++){
    $idProduto = $carrinho[$i][0];
    $idLoja = $carrinho[$i][1];
    $quantidade = $carrinho[$i][2];
    $rows = atualizarEstoque($idLoja,$quantidade,$idProduto);
    
}
unset($_SESSION['carrinho']);
header("location")


?>