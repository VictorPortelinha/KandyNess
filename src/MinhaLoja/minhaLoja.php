<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="minhaLoja.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

<?php include "../HeaderKandyness/HeaderKandyness.php";?>
<div class="formContainer">
        <form action="">
            <h1>Editar Loja</h1>
            <div class="control" style="margin-top: 30px;">
                <label id="lbNomeLoja" for="nomeLoja">Nome da loja</label>
                <input type="text" name="nomeLoja" id="nomeLoja">
                <div style="margin-bottom: 30px;" class="errors" id="errNomeLoja"></div>
            </div>
            
            <label id="lbDesc" for="descDiv">Descrição da loja</label>
            <div class="control" name="descDiv">
                <textarea name="desc" id="desc" rows="3" maxlength="100"></textarea>
                <div class="errors" id="errDesc"></div>
            </div>
            
            <div class="control">
                <label style="color:white" for="imgLoja">Imagem da loja</label>
                <input type="file" id="imgLoja" name="imgLoja" accept="image/png, image/jpeg">
            </div>

            <div class="control">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>