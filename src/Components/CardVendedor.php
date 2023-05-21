<?php require_once "../dbConnection/queries.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    

    <?php 
    $row = selecionarTodasAsLojas();
    foreach($row as $value=>$result):
    $idLoja = $result['id'];
    $pathImagem = retornarPathImagemDaLoja($idLoja);
   
    
    
        
    ?>
    <!-- Passa via get qual o nome da loja ao redirecionar paa a pagina de produtos -->
    <div class="card" onclick=location.href='../PaginaProdutos/produtos.php?idloja=<?php echo $idLoja?>'>
        <div class="imgContainer"><img src="<?php echo "".$pathImagem."" ?>" alt=""></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                 
        <div class="cardContent">
            <div class="cardTitle"><?php echo "Nome da loja: ". $result['nome']; ?></div>
            <div style="margin-top: 2px;">
                <span style="margin-left: -5px;" class="material-symbols-outlined">star</span>
                <span class="material-symbols-outlined join">star</span>
                <span class="material-symbols-outlined join">star</span>
                <span class="material-symbols-outlined join">star</span>
                <span class="material-symbols-outlined join">star</span>
            </div>
            <div class="categoriaLoja">$ • doces, brigadeiro, bolo</div>
            <div class="divider"></div>
            <div class="cardDesc"><?php echo "Descrição: ". $result['descricao']; ?></div>
            

        </div>
    </div>
    
    <?php endforeach; ?>

    
    <script>
       
     </script>

<style>
    .card{
    background-color: rgb(255, 255, 255);
    width: 250px;
    height: 300px;
    display: flex;
    flex-direction: column;
    font-family: "Roboto",sans-serif;
    font-weight: lighter;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
}

.card:hover{
    opacity: 100%;
    scale: 1.05;
    transition: 50ms ease-in-out;
    cursor: pointer;
    filter: brightness(0.9);
}

.imgContainer{
    width: 100%;
    height: 150px;
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
  'wght' 100,
  'GRAD' 0,
  'opsz' 20
}


.join{
    margin-left: -10px;
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
}
</style>