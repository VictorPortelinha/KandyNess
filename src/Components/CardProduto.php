<?php require_once "../dbConnection/queries.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    

    <?php 
    $idLoja = $_GET['idloja'];
    
    $row = selecionarTodosOsProdutos($idLoja);
    if(isset($row)) {
        foreach($row as $value=>$result):
            $idProduto = $result['id'];
            $nomeProduto = $result['nome']; //valores vindos da query do banco de dados
            $descricaoProduto = $result['descricao'];
            $precoProduto = $result['valor'];
            $categoriaProduto = $result['categoria'];
            $pathImagem = retornPathImagemDoProduto($idLoja,$idProduto); //retorn o path da imagem para ser referencido na src do componente
    ?>
    
   
    <div class="card" style="border-radius: 1vmin;">
        <div class="imgContainer">
            <img src="<?php echo "".$pathImagem."" ?>" alt="">
            <div class="crud">
                <div id="<?php echo $idProduto . 'openEdit' ?>" class="iconContainer blue"><span style="color: white;" class="material-symbols-outlined">edit</span></div>
                <div id="<?php echo $idProduto . 'delete' ?>" class="iconContainer red"><span style="color: white;" class="material-symbols-outlined">delete</span></div>
            </div>
        </div>
        <div class="cardContent">
            <div class="cardTitle"><?php echo "Nome do produto:" . $nomeProduto ?></div>
            <div style="margin-top: 4px;" class="categoriaLoja"><?php echo $categoriaProduto ?></div>
            <div class="divider"></div>
            <div class="cardDesc"><?php echo "Descrição do produto:" . $descricaoProduto ?></div>
            <div class="divider"></div>
            <div class="price"><?php echo "Preço: R$ " . $precoProduto ?></div>
        </div>
    </div>
  
    
    <dialog class="modalForm" id= "<?php echo $idProduto . 'modal' ?>">
            <div class="modalDiv">
            <div style="color: blueviolet;"><h1>Editar produto</h1></div>
            
            <form action="./InsertProduto.php" method="post" enctype="multipart/form-data" id="<?php echo $idProduto . 'editForm' ?>">
                <input type="hidden" name="idLoja" value="<?php echo "".$idLoja."" ?>">
                <input type="hidden" name="idProduto" value="<?php echo "".$idProduto."" ?>">
                
                
                <label for="nomeProduto">Nome do produto:</label>
                <input type="text" value= "<?php echo $nomeProduto?>" name="nomeProduto" id= "<?php echo $idProduto . 'editName' ?>">
                <div class="addErrors" id="<?php echo $idProduto . 'nameErrors'?>"></div>
                
                
                <label for="categoriaProduto">Categoria do produto:</label>
                <select name="categoriaProduto" id="<?php echo $idProduto . 'editCat'?>" required>
                    <option value="null" label=""></option>
                    <option value="Doces" label="Doces"></option>
                    <option value="Salgados" label="Salgados"></option>
                    <option value="Bebidas" label="Bebidas"></option>
                </select>
                <div class="addErrors" id="<?php echo $idProduto . 'catErrors'?>"></div>
                 
                
                <label for="descProduto">Descrição do produto:</label>
                <textarea name="descProduto" id="<?php echo $idProduto . 'editDesc'?>" value="<?php echo $descricaoProduto?>" cols="28" rows="4" maxlength="100"></textarea>
                <div class="addErrors" id="<?php echo $idProduto . 'descErrors'?>"></div>
                
                
                <label for="precoProduto">Preço do produto:</label>
                <div class="addErrors" id="<?php echo $idProduto . 'priceErrors'?>"></div>
                <input type="text" id="<?php echo $idProduto . 'editPrice'?>" value= "<?php echo $precoProduto?>" name="precoProduto" placeholder="Ex: 45.00">
                
                
                <label class="imgProduto" for="imgProduto">
                    Imagem do produto:
                    <input style="display: none;" type="file" id="imgProduto" name="imgProduto" accept="image/*">
                </label>
                <div class="addErrors" id="<?php echo $idProduto . 'imgErrors'?>"></div>
                
                
                <div style="display: flex;height: 65px;justify-content: center;align-items: center;">
                    <button id="<?php echo $idProduto . 'submitBtn'?>" class="submitBtn">Enviar</button>
                </div>    
            </form>
        </div>






    </dialog>

    <script>
        //variaveis php
        let id = <?php echo json_encode($idProduto); ?>;
        let nome = <?php echo json_encode($nomeProduto); ?>;
        let categoria = <?php echo json_encode($categoriaProduto); ?>;
        let desc = <?php echo json_encode($descricaoProduto); ?>;
        let preco = <?php echo json_encode($precoProduto); ?>;
    

        const openEditModal = document.getElementById(id + "openEdit")
        const editModal = document.getElementById(id + "modal")
        openEditModal.addEventListener('click',() =>{
            editModal.showModal()
        })

        editModal.addEventListener("click", e => {
            const dialogDimensions = editModal.getBoundingClientRect()
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
        ) {
        editModal.close()
    }
    })


        const editForm = document.getElementById(id + "editForm")
        const editName = document.getElementById(id + "editName")
        const editPrice = document.getElementById(id +"editPrice")
        const submitForm = document.getElementById(id +"submitBtn")
        const editDesc = document.getElementById(id +"editDesc")
        const editCategoria = document.getElementById(id +"editCat")
        
        const descErrors = document.getElementById(id +"descErrors")
        const nameErrors = document.getElementById(id +"nameErrors")
        const priceErrors = document.getElementById(id +"priceErrors")
        const catErrors = document.getElementById(id +"catErrors")
        //falta img dps
    
        
    submitForm.addEventListener("click",(e) => {
            catErrors.innerHTML= "";
            priceErrors.innerHTML = "";
            nameErrors.innerHTML = "";
            descErrors.innerHTML="";
            imgErrors.innerHTML = "";
            
            let errorsCounter = 0;
            let priceRegex = /^\d+(\.\d{1,2})?$/;
            let errors = []
            let selectedOption = editCategoria.options[editCategoria.selectedIndex]
    
        
            let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
            if (editName.value.length < 3) {
            errors.push("O nome precisa conter pelo menos 3 caracteres!");
            errorsCounter++
            }
            if (nameRegex.test(editName.value)) {
                errors.push("O nome só pode conter letras!");
                errorsCounter++
            }
     
            if (errors.length > 0) {
                errorsCounter++
                e.preventDefault();
            errors.forEach(
                (item) => (nameErrors.innerHTML += "- " + item + "<br>")
            )}
            

            if(!priceRegex.test(editPrice.value)){
                e.preventDefault();
                priceErrors.innerHTML = "Digite o preço no formato especificado!"
                errorsCounter++
            }

            if(editDesc.value.length < 15){
                e.preventDefault()
                descErrors.innerHTML = "A descrição precisa conter pelo menos 15 caracteres!"
                errorsCounter++
            }

            if(selectedOption.value == "null"){
                e.preventDefault()
                catErrors.innerHTML = "Selecione uma categoria!"
                errorsCounter++
            }
        
            if(errorsCounter == 0){
                addForm.submit()
            }
        })
        
    </script>

    
    
    <?php endforeach;} else{
        echo 'Não há produtos cadastrados para está loja, retornando a página de vendedores';
    }

    ?>

    

<style>
    
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