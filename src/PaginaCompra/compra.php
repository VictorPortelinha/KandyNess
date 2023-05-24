<?php
// require "../dbConnection/queries.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de compra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="compraStyles/carrinho.css">
</head>
<body>

    <?php include "../HeaderKandyness/HeaderKandyness.php";
        // $idProduto = $_GET['idProduto'];
        // $idLoja = $_GET['idLoja'];
        // $rows = selectProdutoById($idProduto,$idLoja);
        // foreach($rows as $value=>$result):
        //     $idProduto = $result['id'];
        //     $nomeProduto = $result['nome']; //valores vindos da query do banco de dados
        //     $descricaoProduto = $result['descricao'];
        //     $precoProduto = $result['valor'];
        //     $categoriaProduto = $result['categoria'];
        // endforeach;
    ?>

    <!-- <div id="openAdd" class="absoluteLeft">
        <button class="add">
            <div class="vert"></div>
            <div class="hor"></div>
        </button>
    </div>
    <div class="bigDivider">
        <div class="nomeLoja"></div>
    </div>
   
    <div class="card" style="border-radius: 1vmin;">
        <div class="imgContainer">
            <img src=" ?>" alt="">
        </div>
        <div class="cardContent">
            <div class="cardTitle"><?php //echo $nomeProduto ?></div>
            <div style="margin-top: 4px;" class="categoriaLoja"><?php //echo $categoriaProduto ?></div>
            <div class="divider"></div>
            <div class="cardDesc"><?php //echo "Descrição do produto:" . $descricaoProduto ?></div>
            <div class="divider"></div>
            <div class="price"><?php //echo "Preço: R$ " . $precoProduto ?></div>
        </div>
    </div> -->

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
                <tr>
                    <td>Laranja</td>
                    <td class="flex">
                        <div class="decrement"></div>
                        <div class="num">2</div>
                        <div class="increment"></div>
                    </td>
                    <td>
                        <div class="remove"></div>
                    </td>
                    <td>R$ 50.00</td>
                    
 
                </tr>
                <tr>
                    <td>Laranja</td>
                    <td> 2 </td>
                    <td><button>remover</button></td>
                    <td>R$ 50.00</td>
 
                </tr>
            </tbody>
            
        </table>
    </div>
    
</body>

