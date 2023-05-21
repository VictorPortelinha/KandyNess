<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

    <?php include "../HeaderKandyness/HeaderKandyness.php" ?>
    <div id="openAdd" class="absoluteLeft">
        <button class="add">
            <div class="vert"></div>
            <div class="hor"></div>
        </button>
    </div>
    <div class="bigDivider"></div>
    <div class="cardGrid">
        <!--include do card -->
    </div>
    
    

    
        <dialog id="addModal" class="modalForm">
        <div class="modalDiv">
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
                
                <label class="imgProduto" for="imgProduto">
                    Imagem do produto:
                    <input style="display: none;" type="file" id="imgProduto" name="imgProduto" accept="image/*">
                </label>
                <div class="addErrors" id="imgErrors"></div>
                
                <div style="display: flex;height: 65px;justify-content: center;align-items: center;">
                    <button id="submitBtn" class="submitBtn">Enviar</button>
                </div>    
            </form>
        </div>
    </dialog>
    
    
</body>

<script>
    const openAddModal = document.getElementById("openAdd")
    const addModal = document.getElementById("addModal")
    openAddModal.addEventListener('click',() =>{
        addModal.showModal()
    })

    addModal.addEventListener("click", e => {
        const dialogDimensions = addModal.getBoundingClientRect()
        if (
            e.clientX < dialogDimensions.left ||
            e.clientX > dialogDimensions.right ||
            e.clientY < dialogDimensions.top ||
            e.clientY > dialogDimensions.bottom
    ) {
    addModal.close()
  }
})



    const addText = document.getElementById("addText")
    const addForm = document.getElementById("addForm")
    const priceText = document.getElementById("precoProduto")
    const submitForm = document.getElementById("submitBtn")
    const addDesc = document.getElementById("descProduto")
    const addCategoria = document.getElementById("categoriaProduto")
    const addImg = document.getElementById("imgProduto")
    
    const descErrors = document.getElementById("descErrors")
    const addErrors = document.getElementById("addErrors")
    const priceErrors = document.getElementById("priceErrors")
    const catErrors = document.getElementById("catErrors")
    const imgErrors = document.getElementById("imgErrors")
  
    
   submitForm.addEventListener("click",(e) => {
        catErrors.innerHTML= "";
        priceErrors.innerHTML = "";
        addErrors.innerHTML = "";
        descErrors.innerHTML="";
        imgErrors.innerHTML = "";
        
        let errorsCounter = 0;
        let priceRegex = /^\d+(\.\d{1,2})?$/;
        let errors = []
        let selectedOption = addCategoria.options[addCategoria.selectedIndex]
        let imgFile = addImg.files[0];

      
        let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
        if (addText.value.length < 3) {
          errors.push("O nome precisa conter pelo menos 3 caracteres!");
          errorsCounter++
        }
        if (nameRegex.test(addText.value)) {
            errors.push("O nome só pode conter letras!");
            errorsCounter++
        }

        if(!imgFile){
            e.preventDefault()
            imgErrors.innerHTML = "Insira uma imagem para o produto!"
        }
        
        if (errors.length > 0) {
            errorsCounter++
          e.preventDefault();
          errors.forEach(
            (item) => (addErrors.innerHTML += "- " + item + "<br>")
          )}
          

        if(!priceRegex.test(priceText.value)){
            e.preventDefault();
            priceErrors.innerHTML = "Digite o preço no formato especificado!"
            errorsCounter++
        }

        if(addDesc.value.length < 15){
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
        grid-template-columns: repeat(6,250px);
        gap: 50px;
        margin-top: 12px;
        margin-left: 60px;
    }

  
    .bigDivider{
        background-color: blueviolet;
        width: 95%;
        height: 2px;
        margin: auto;
        margin-top: 11vh;
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