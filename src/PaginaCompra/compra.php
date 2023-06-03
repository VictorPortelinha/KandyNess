<?php
require "../dbConnection/queries.php";
session_start();
if(isset($_SESSION['matricula'])){
    $pass;
}else{
    header('location:http://localhost/webProjects/KandyNess/src/PaginaLogin/cadastro.php');
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
            $idProduto = $_GET['idProduto'];
            $idLoja = $_GET['idLoja'];
            $rows = selectProdutoById($idProduto,$idLoja);
            foreach($rows as $value=>$result):
            $idProduto = $result['id'];
            $nomeProduto = $result['nome']; //valores vindos da query do banco de dados
            $descricaoProduto = $result['descricao'];
            $precoProduto = $result['valor'];
            $categoriaProduto = $result['categoria'];?>
                <tr>
                    <td><?php echo $nomeProduto ?></td>
                    <td class="flex">
                        <div class="decrement">
                            <span style="color:white" class="material-symbols-outlined">remove</span>
                        </div>
                        <div class="num">2</div>
                        <div class="increment">
                            <span style="color:white" class="material-symbols-outlined">add</span>
                        </div>
                    </td>
                    <td >
                        <div class="remove">
                            <span style="color:white" class="material-symbols-outlined">close</span>
                        </div>
                    </td>
                    <td><?php echo $precoProduto?></td>
                </tr>
                <tr>
                <?php endforeach; ?>
                    <td colspan="2">
                        <input style="margin-left: 5vw;" type="button" value="Esvaziar carrinho">
                    </td>
                    <td colspan="2">
                    <input style="border-color: green;background:green"  type="button" value="Finalizar compra">
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>
    
    
</body>

