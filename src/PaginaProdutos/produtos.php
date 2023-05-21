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
        <?php include "../Components/CardProduto.php"?>
    </div>
    
 

    
        <dialog id="addModal">
        <div class="modalForm">
            <div style="color: blueviolet;"><h1>Adicionar produto</h1></div>
            <form action="insertNewProduct" method="post" id="addForm">
                <label for="nomeProduto">Nome do produto:</label>
                <input type="text" name="nomeProduto" id="addText">
                <div class="addErrors" id="addErrors"></div>
                
                <label for="categoriaProduto">Categoria do produto:</label>
                <select name="categoriaProduto" id="categoriaProduto" required>
                    <option value="Doces" label="Doces"></option>
                    <option value="Salgados" label="Salgados"></option>
                    <option value="Lolis" label="Bebidas"></option>
                </select>
                 
                <label for="DescProduto">Descrição do produto:</label>
                <textarea name="DescProduto" id="DescProduto" cols="28" rows="4" maxlength="100" required></textarea>
                <label for="precoProduto">Preço do produto:</label>
                <div class="addErrors" id="priceErrors"></div>
                <input type="text" id="precoProduto" name="precoProduto" placeholder="Ex: 45.00">
                
                <label class="imgProduto" for="ImgProduto">
                    Imagem do produto:
                    <input style="display: none;" type="file" id="ImgProduto" name="ImgProduto" accept="image/*">
                </label>
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
    const close = document.getElementById("closeAdd")
    openAddModal.addEventListener('click',() =>{
        addModal.showModal()
    })

    const addText = document.getElementById("addText")
    const addForm = document.getElementById("addForm")
    const addErrors = document.getElementById("addErrors")
    const priceText = document.getElementById("precoProduto")
    const priceErrors = document.getElementById("priceErrors")
    const submitForm = document.getElementById("submitBtn")
   
  
    
   submitForm.addEventListener("click",(e) => {
        priceErrors.innerHTML = "";
        addErrors.innerHTML = "";
        let priceRegex = /^\d+(\.\d{1,2})?$/;
        let errors = []
        
        let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
        if (addText.value.length < 3) {
          errors.push("O nome precisa conter pelo menos 3 caracteres!");
        }
        if (nameRegex.test(addText.value)) {
            errors.push("O nome só pode conter letras!");
        }
        if(!priceRegex.test(priceText.value)){
            e.preventDefault();
            priceErrors.innerHTML = "Digite o preço no formato especificado!"
        }
        if (errors.length > 0) {
          e.preventDefault();
          errors.forEach(
            (item) => (addErrors.innerHTML += "- " + item + "<br>")
          )}
        else{
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
    background-color: white;
    width: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: sans-serif;
    margin-left: ;


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
    margin-top: 15px;
    position: absolute;
    margin: auto;
}

.addErrors{
    margin-top: 5px;
    color: red;
}

    
    

</style>