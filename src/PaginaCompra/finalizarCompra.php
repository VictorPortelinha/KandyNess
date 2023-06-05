<?php
require "../dbConnection/queries.php";
session_start();

$carrinho = $_SESSION['carrinho'];

for($i = 0; $i < count($carrinho);$i++){
    $idProduto = $carrinho[$i][0];
    $idLoja = $carrinho[$i][1];
    $quantidade = $carrinho[$i][2];
    $rows = atualizarEstoque($idLoja,$quantidade,$idProduto);
    if($rows == 0){
        $_SESSION['erros'] = [];
        array_push($_SESSION['erros'],'Falha na compra: A quantidade de um dos itens da compra é maior que o que há em estoque');
        array_push($_SESSION['erros'],'tente novamente com uma quantidade menor de itens');
        $_SESSION['compraFinalizada'] = 0;
        $_SESSION['carrinho'] = [];
        header("location:http://localhost/webProjects/KandyNess/src/FinalizarCompra/compraFinalizada.php");
    }
    $_SESSION['carrinho'] = [];
}
$_SESSION['compraFinalizada'] = 1;

header("location:http://localhost/webProjects/KandyNess/src/FinalizarCompra/compraFinalizada.php")


?>