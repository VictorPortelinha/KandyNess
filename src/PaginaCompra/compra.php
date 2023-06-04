<?php
require "../dbConnection/queries.php";
session_start();
if(isset($_SESSION['matricula'])){
    $pass;
}else{
    header('location:http://localhost/webProjects/KandyNess/src/PaginaLogin/cadastro.php');
}
if(isset($_GET['addQuantidade']) && isset($_GET['indexProduto'])) {
    $index = $_GET['indexProduto'];
    $quantidade = $_GET['addQuantidade'];
    $quantidade += 1;
    $_SESSION['carrinho'][$index][2] = $quantidade;
}elseif(isset($_GET['subQuantidade']) && isset($_GET['indexProduto'])){
    $index = $_GET['indexProduto'];
    $quantidade = $_GET['subQuantidade'];
    $quantidade -= 1;
    $_SESSION['carrinho'][$index][2] = $quantidade;
}elseif(isset($_GET['indexRemoverProduto'])){
    $index = $_GET['indexRemoverProduto'];
    $removeCarrinho = $_SESSION['carrinho'];
    unset($removeCarrinho[$index]);
    $_SESSION['carrinho'] = array_values($removeCarrinho);
}elseif(isset($_GET['indexRemoverTodosProdutos'])) {
    unset($_SESSION['carrinho']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de compra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="compraStyles/compra.css">
</head>
<body>
    <?php include "../HeaderKandyness/HeaderKandyness.php"; ?>
    <div class="containerCarrinho">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Remover</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($_SESSION['carrinho'])){
            $carrinho = $_SESSION['carrinho'];
            
            for($i = 0; $i < count($carrinho);$i++){
                $idProduto = $carrinho[$i][0];
                $idLoja = $carrinho[$i][1];
                $quantidade = $carrinho[$i][2];
                $rows = selectProdutoById($idProduto,$idLoja);
                foreach($rows as $value=>$result):
                $nomeProduto = $result['nome']; //valores vindos da query do banco de dados
                $precoProduto = $result['valor'];
                
            ?>  
                <form method="POST" action="finalizarCompra.php">
                <tr>
                    <td><?php echo $nomeProduto ?></td>
                    <td class="flex">
                        <div onclick="subtrairItem(<?php echo $i ?>,<?php echo $quantidade ?>)" class="decrement">
                            <span style="color:white" class="material-symbols-outlined">remove</span>
                        </div>
                        <div class="num"><?php echo $quantidade ?></div>
                        <div onclick="adcionarItem(<?php echo $i ?>,<?php echo $quantidade ?>)" class="increment">
                            <span style="color:white" class="material-symbols-outlined">add</span>
                        </div>
                    </td>
                    <td >
                        <div onclick="removerItem(<?php echo $i ?>)" class="remove">
                            <span style="color:white" class="material-symbols-outlined">close</span>
                        </div>
                    </td>
                    <td><?php echo $precoProduto?></td>
                </tr>
                <tr>
                <?php endforeach;}} ?>
                    <td colspan="2">
                        <input onclick="deleteCarrinho(<?php echo $i ?>)" style="margin-left: 5vw;" type="button" value="Esvaziar carrinho">
                    </td>
                    <td colspan="2">
                    <input type="submit" style="border-color: green;background:green"  type="button" value="Finalizar compra">
                    </td>
                </tr>
                </form>
            </tbody>
            
        </table>
    </div>
    <script>
        function adcionarItem(index,quantidade){
            location.href = `./compra.php?indexProduto=${index}&addQuantidade=${quantidade}`
        }
        function subtrairItem(index,quantidade){
            location.href = `./compra.php?indexProduto=${index}&subQuantidade=${quantidade}`
        }
        function removerItem(index){
            location.href = `./compra.php?indexRemoverProduto=${index}`
        }
        function deleteCarrinho(index){
            location.href = `./compra.php?indexRemoverTodosProdutos=${index}`
        }
            
    </script>
    
</body>

