<?php
require "../dbConnection/queries.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página da loja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

    <?php include "../HeaderKandyness/HeaderKandyness.php";
    $idLojaVendedor = 1;
    
    
    $idLoja = $_GET['idloja'];
    

    $nome = selectNomeDoLoja($idLoja);
    
    ?>
    <!--Botão adcionar loja loja-->
    <?php if($idLoja == $idLojaVendedor){ 
        // verfificar se o vendedor "logado" está dentro de sua própria loja, desativando a div de adição de produtos caso nao esteja
        ?>
    <div id="openAdd" class="absoluteLeft">
        <button class="add">
            <div class="vert"></div>
            <div class="hor"></div>
        </button>
    <?php }; ?>
    </div>
    <div class="bigDivider">
        <div class="nomeLoja"><h1> <?php echo $nome ?></h1></div>
    </div>
    <div class="cardGrid">
        <?php include "../Components/CardProduto.php";
        
        
        ?>
    </div>
    
    

        <!--Form de ADD -->
        <dialog id="addModal" class="modalForm">
        <div class="modalDiv">
            <div class="close" id="closeAdd">
                <div class="hor"></div>
            </div>
            <div style="color: blueviolet;"><h1>Adicionar produto</h1></div>
            <form action="./InsertProduto.php" method="post" enctype="multipart/form-data" id="addForm">
                <input type="hidden" name="idLoja" value="<?php echo "".$idLoja."" ?>">
                <input type="hidden" name="idProduto" value="<?php echo "".$idProduto."" ?>">
                
                <label for="nomeProduto">Nome do produto:</label>
                <input type="text" name="nomeProduto" id="addText">
                <div class="addErrors" id="addErrors"></div>
                
                <label for="categoriaProduto">Categoria do produto:</label>
                <select name="categoriaProduto" id="categoriaProduto" required>
                    <option value="null" label=""></option>
                    <option value="Doces" label="Doces"></option>
                    <option value="Salgados" label="Salgados"></option>
                    <option value="Bebidas" label="Bebidas"></option>
                </select>
                <div class="addErrors" id="catErrors"></div>
                 
                <label for="descProduto">Descrição do produto:</label>
                <textarea name="descProduto" id="descProduto" cols="28" rows="4" maxlength="100"></textarea>
                <div class="addErrors" id="descErrors"></div>
                
                <label for="precoProduto">Preço do produto:</label>
                <div class="addErrors" id="priceErrors"></div>
                <input type="text" id="precoProduto" name="precoProduto" placeholder="Ex: 45.00">
        
                
                <div style="display: flex;height: 65px;justify-content: center;align-items: center;">
                    <button id="submitBtn" class="submitBtn">Enviar</button>
                </div>    
            </form>
        </div>
    </dialog>

    <!--Form de edit -->
    <dialog  class="modalForm" id= "modalEdit">
            <div class="modalDiv">
            <div class="close" id="closeEdit">
                <div class="hor"></div>
            </div>
            <div style="color: blueviolet;"><h1>Editar produto</h1></div>
            
            <form action="./updateProduto.php" method="post" enctype="multipart/form-data" id="editForm" nome="editForm">
                <input type="hidden" name="idLoja" value="<?php echo "".$idLoja."" ?>">
                <input type="hidden" name="idProduto" value="<?php echo "".$idProduto."" ?>">
                
                
                <label for="nomeProduto">Nome do produto:</label>
                <input value="<?php echo $nomeProduto ?>" type="text" name="nomeProduto" id= "editName">
                <div class="addErrors" id="nameErrorsEdit"></div>
                
                
                <label for="categoriaProduto">Categoria do produto:</label>
                <select name="categoriaProduto" id="editCat" required>
                    <option value="null" selected label=""></option>
                    <option value="Doces" label="Doces"></option>
                    <option value="Salgados" label="Salgados"></option>
                    <option value="Bebidas" label="Bebidas"></option>
                </select>
                <div class="addErrors" id="catErrorsEdit"></div>
                 
                
                <label for="descProduto">Descrição do produto:</label>
                <textarea value="<?php echo $descricaoProduto ?>" name="descProduto" id="editDesc"  cols="28" rows="4" maxlength="100"></textarea>
                <div class="addErrors" id="descErrorsEdit"></div>
                
                
                <label for="precoProduto">Preço do produto:</label>
                <div class="addErrors" id="priceErrorsEdit"></div>
                <input value="<?php echo $precoProduto ?>" type="text" id="editPrice"  name="precoProduto" placeholder="Ex: 45.00">
                
                
                
                
                <div style="display: flex;height: 65px;justify-content: center;align-items: center;">
                    <button id="submitBtnEdit" class="submitBtn">Enviar</button>
                </div>    
            </form>
        </div>
    
    
</body>

<script>
    // change text area
    
    function changeTextArea(valueTextArea){
        document.forms['editForm']['descProduto'].value = valueTextArea;
    }
    
    // delete produto
    function removeItem(idProduto,idLoja){
        location.href = `./removeProduto.php?idLoja=${idLoja}&idProduto=${idProduto}`
    }
    
    function redirectPgCompra(idProduto,idLoja,currentUser){
        if(idLoja == currentUser){
            alert("Você não pode comprar um produto de sua própria loja!")
        }
        else{
            location.href = `../PaginaCompra/compra.php?idLoja=${idLoja}&idProduto=${idProduto}`
        }
        
    }
  



    //verificação do form de Add
    const closeAdd = document.getElementById("closeAdd")
    const openAddModal = document.getElementById("openAdd")
    const addModal = document.getElementById("addModal")
    openAddModal.addEventListener('click',() =>{
        addModal.showModal()
    })
    closeAdd.addEventListener('click',() => {
        addModal.close()
    })
   

    const addText = document.getElementById("addText")
    const addForm = document.getElementById("addForm")
    const priceText = document.getElementById("precoProduto")
    const submitForm = document.getElementById("submitBtn")
    const addDesc = document.getElementById("descProduto")
    const addCategoria = document.getElementById("categoriaProduto")

    
    const descErrors = document.getElementById("descErrors")
    const addErrors = document.getElementById("addErrors")
    const priceErrors = document.getElementById("priceErrors")
    const catErrors = document.getElementById("catErrors")
   
  
    
   submitForm.addEventListener("click",(e) => {
        catErrors.innerHTML= "";
        priceErrors.innerHTML = "";
        addErrors.innerHTML = "";
        descErrors.innerHTML="";
     
        
        let errorsCounter = 0;
        let priceRegex = /^\d+(\.\d{1,2})?$/;
        let errors = []
        let selectedOption = addCategoria.options[addCategoria.selectedIndex]
      

      
        let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
        if (addText.value.length < 3) {
          errors.push("O nome precisa conter pelo menos 3 caracteres!");
          errorsCounter++
        }
        if (nameRegex.test(addText.value)) {
            errors.push("O nome só pode conter letras!");
            errorsCounter++
        }

        
        if (errors.length > 0) {
          e.preventDefault();
          errors.forEach(
            (item) => (addErrors.innerHTML += "- " + item + "<br>")
          )}
          

        if(!priceRegex.test(priceText.value)){
            e.preventDefault();
            priceErrors.innerHTML = "Digite o preço no formato especificado!"
            errorsCounter++
        }

        if(addDesc.value.length < 5){
            e.preventDefault()
            descErrors.innerHTML = "A descrição precisa conter pelo menos 5 caracteres!"
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

    //verificação form de edit
        const closeEdit = document.getElementById("closeEdit")
        const modalEdit = document.getElementById("modalEdit")
        const editForm = document.getElementById("editForm")
        const editName = document.getElementById("editName")
        const editPrice = document.getElementById("editPrice")
        const submitFormEdit = document.getElementById("submitBtnEdit")
        const editDesc = document.getElementById("editDesc")
        const editCategoria = document.getElementById("editCat")
        
        const descErrorsEdit = document.getElementById("descErrorsEdit")
        const nameErrorsEdit = document.getElementById("nameErrorsEdit")
        const priceErrorsEdit = document.getElementById("priceErrorsEdit")
        const catErrorsEdit = document.getElementById("catErrorsEdit")
 
    
    function openEditForm(valueTextArea){
        console.log(typeof valueTextArea)
        changeTextArea(valueTextArea);
  
        modalEdit.showModal();
        
    }
  
    closeEdit.addEventListener("click", () => {
        modalEdit.close()
    })





        
    submitFormEdit.addEventListener("click",(e) => {
            catErrorsEdit.innerHTML= "";
            priceErrorsEdit.innerHTML = "";
            nameErrorsEdit.innerHTML = "";
            descErrorsEdit.innerHTML="";
            
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
                (item) => (nameErrorsEdit.innerHTML += "- " + item + "<br>")
            )}
            

            if(!priceRegex.test(editPrice.value)){
                e.preventDefault();
                priceErrorsEdit.innerHTML = "Digite o preço no formato especificado!"
                errorsCounter++
            }

            if(editDesc.value.length < 15){
                e.preventDefault()
                descErrorsEdit.innerHTML = "A descrição precisa conter pelo menos 15 caracteres!"
                errorsCounter++
            }

            if(selectedOption.value == "null"){
                e.preventDefault()
                catErrorsEdit.innerHTML = "Selecione uma categoria!"
                errorsCounter++
            }
        
            if(errorsCounter == 0){
                editForm.submit()
            }
        })



    


</script>

</html>

<style>

     .center{
       position: absolute;
       left: 50%;
       top: 50%;
       transform: translate(-50%, -50%);
     }

    .absoluteLeft{
        position: absolute;
        right: 3vw;
        top:12vh;
    }    


    .close{
        width: 50px;
        height: 50px;
        border-radius: 5vmin;
        background-color: orangered;
        position: absolute;
        right: 0;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close:hover{
        filter: brightness(0.8);
        cursor: pointer;
    }


    .add{
        background-color: green;
        height: 60px;
        width: 60px;
        border: 0;
        border-radius: 5vmin;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
    }

    .add:Hover{
        filter: brightness(0.9);
        cursor: pointer;
    }

    .vert{
        background-color: white;
        width: 5px;
        height: 70%;
    }

    .hor{
        background-color: white;
        width: 70%;
        height: 5px;
        position: absolute;
    }

 
    .cardGrid{
        display: grid;
        grid-template-columns: repeat(5,250px);
        gap: 50px;
        margin-top: 12px;
        margin-left: 60px;
    }

  
    .bigDivider{
        position: relative;
        background-color: blueviolet;
        width: 95%;
        height: 2px;
        margin: auto;
        margin-top: 11vh;
    }

    .nomeLoja{
        position: absolute;
        color: blueviolet;
        font: sans-serif;
        top: -35px;
      
    }

    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
    
    /*modal */

    .modalForm{
        background-color: #f5f5f5;
        position: absolute;
        margin: auto;
        border: 0;
        padding: 30px;
        border-radius: 1vmin;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
    }

    .modalDiv{
    background-color: #f5f5f5;
    width: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: sans-serif;


}


#modal{
    border: 2px solid blueviolet;
    border-radius: 1vmin;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
}

input{
    width: 100%;
    font-size: 25px;
    display: block;
}

label{
    margin-top: 15px;
    font-weight: bold;
    color: blueviolet;
    display: block;
    font-size: 20px;
}

select{
    width: 100%;
    font-size: 20px;
    font: sans-serif;
}

textarea{
    width: 100%;
    font-size: 25px;
    font-family: sans-serif;
}

.imgProduto{
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

.submitBtn{
    background-color: blueviolet;
    color: white;
    font-family: sans-serif;
    font-size: 25px;
    border-radius: 1vmin;
    margin-top: 20px;
    position: absolute;
    margin: auto;
    width: 30%;
}

.addErrors{
    margin-top: 5px;
    color: red;
}

    
    

</style>