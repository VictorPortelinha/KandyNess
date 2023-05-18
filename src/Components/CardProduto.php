<?php require_once "../dbConnection/queries.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    

    <?php 
    $nomeLoja = $_GET['nomeloja'];
    $row = selecionarTodosOsProdutos($nomeLoja);
    foreach($row as $value=>$result):
    $nomeProduto = $result['nome'];
    $descricaoProduto = $result['descricao'];
    $precoProduto = $result['valor'];

        
    ?>
    
    <div class="cardGrid">
        <div class="card" style="border-radius: 1vmin;">
        <div class="imgContainer">
            <img src="" alt="">
            <div class="crud">
                <div class="iconContainer blue"><span style="color: white;" class="material-symbols-outlined">edit</span></div>
                <div class="iconContainer red"><span style="color: white;" class="material-symbols-outlined">delete</span></div>
            </div>
        </div>
        <div class="cardContent">
            <div class="cardTitle"><?php echo "Nome do produto:" . $nomeProduto ?></div>
            <div style="margin-top: 4px;" class="categoriaLoja">$ • doces, brigadeiro, bolo</div>
            <div class="divider"></div>
            <div class="cardDesc"><?php echo "Descrição do produto:" . $descricaoProduto ?></div>
            <div class="divider"></div>
            <div class="price"><?php echo "Preço: R$ " . $precoProduto ?></div>
        </div>
    </div>
    </div>
    
    
    <?php endforeach;  ?>

    <script>
        
     </script>

<style>
    .cardGrid{
    display: grid;
    grid-template-columns: repeat(6,250px);
    gap: 50px;
}

.card{
    background-color: rgb(255, 255, 255);
    width: 250px;
    height: 320px;
    display: flex;
    flex-direction: column;
    font-family: "Roboto",sans-serif;
    font-weight: lighter;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
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