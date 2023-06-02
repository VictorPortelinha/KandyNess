<?php
require_once "../dbConnection/queries.php";

$nomeVendedor = $_SESSION['nome'];
$matriculaVendedor = $_SESSION['matricula'];
$idLojaVendedor = $_SESSION['idLoja'];



?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    

    <?php 
    $idLoja = $_GET['idloja'];
    
    $row = selecionarTodosOsProdutos($idLoja); // query select
    if(isset($row)) {
        foreach($row as $value=>$result):
            $idProduto = $result['id'];
            $nomeProduto = $result['nome']; //valores vindos da query do banco de dados
            $descricaoProduto = $result['descricao'];
            $precoProduto = $result['valor'];
            $categoriaProduto = $result['categoria'];
            
            
    ?>
    
    <div class="cardGrid">
        <div onclick="redirectPgCompra(<?php echo $idProduto?>,<?php echo $idLoja?>,<?php echo $idLojaVendedor?>)" class="card" style="border-radius: 1vmin;">
        <div class="imgContainer">
            <img src=" ?>" alt="">
            <div class="crud">
                <?php if($idLoja == $idLojaVendedor){ //verifica se o vendendor está dentro de sua prórpia loja

                 
                ?> 
                <div onclick="openEditForm('<?php echo $descricaoProduto?>');event.stopPropagation();" class="iconContainer blue"><span style="color: white;" class="material-symbols-outlined">edit</span></div>
                <div onclick="removeItem(<?php echo $idProduto ?>,<?php echo $idLoja ?>);event.stopPropagation();" class="iconContainer red"><span style="color: white;" class="material-symbols-outlined">delete</span></div>
                <?php }?>
            </div>
        </div>
        <div class="cardContent">
            <div class="cardTitle"><?php echo $nomeProduto ?></div>
            <div style="margin-top: 4px;" class="categoriaLoja"><?php echo $categoriaProduto ?></div>
            <div class="divider"></div>
            <div class="cardDesc"><?php echo "Descrição do produto:" . $descricaoProduto ?></div>
            <div class="divider"></div>
            <div class="price"><?php echo "Preço: R$ " . $precoProduto ?></div>
        </div>
    </div>
        </div>

    </dialog>

    
    <?php endforeach;} else{
        $idProduto = returnAutoIncrementValue(); // retorna o valor atual do AutoIncrement, mesmo que a tabela esteja vazia
        if($idLojaVendedor != $idLoja){ // Caso o vendedor não seja dono da loja que não possui produtos, ele é redirecionado
            echo "Você não é o vendedor desta loja, e a loja não possui produtos, você será automaticamente redirecionado";
    ?>
        <script>
            setTimeout(() =>{
                window.location.href = '../PaginaVendedores/vendedores.php'
            },4000)
    
        </script>

        <?php }
    }?>

    

<style>
    
.card{
    background-color: #f5f5f5;
    width: 250px;
    height: 320px;
    display: flex;
    flex-direction: column;
    font-family: "Roboto",sans-serif;
    font-weight: lighter;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
}

.card:hover{
    cursor: pointer;
    filter: brightness(0.9);

}

.imgContainer{
    width: 100%;
    height: 150px;
    position: relative;
}
.imgContainer img{
    width: 100%;
    height: 100%;
}

.cardContent{
   display: flex;
   flex-direction: column;
   padding-left: 10px;
   padding-right: 10px;
}

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 300,
  'GRAD' 0,
  'opsz' 20
}

.iconContainer{
   height: 30px;
   width: 30px;
   border-radius: 5vmin;
   display: flex;
   align-items: center;
   justify-content: center;
   box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
}

.iconContainer:hover{
    cursor: pointer;
    filter: brightness(0.8);
}

.red{
    background-color: #F44336;
}

.blue{
    background-color: #2196F3;
}

.join{
    margin-left: -10px;
}

.crud{
    display: flex;
    gap: 3px;
    position: absolute;
    right: 0px;
    top: 0;
}

.categoriaLoja{
    margin-top: 2px;
    color: hsl(0, 0%, 30%);
    font-size: 12px;
}

.cardTitle{
    margin-top: 12px;
    font-weight: bold;
}

.divider{
    background-color: hsl(0, 0%, 80%);
    height: 0.08px;
    margin-top: 10px;
    
}
.cardDesc{
    font-size: 11px;
    color: hsl(0, 0%, 40%);
    margin-top: 12px;
    word-wrap: break-word;
    height: 36px;
}

.price{
    color: blueviolet;
    font-weight: 600;
    position: relative;
    top: 9px;
}
</style>