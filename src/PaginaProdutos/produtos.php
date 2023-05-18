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
    <dialog id="addModal" class="center">
        <div>kk eae man</div>
        <button id="closeAdd">Close</button>
        </dialog>
    
    
</body>

<script>
    const openAddModal = document.getElementById("openAdd")
    const addModal = document.getElementById("addModal")
    const close = document.getElementById("closeAdd")
    openAddModal.addEventListener('click',() =>{
        addModal.showModal()
    })

    close.addEventListener('click',() => {
        addModal.close()
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

    

</style>