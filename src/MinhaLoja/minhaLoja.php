<?php
session_start();
require "../dbConnection/queries.php";

if(isset($_SESSION)){
    $matricula = $_SESSION['matricula'];
    $idLoja = selectIdDaLoja($matricula);
    
}

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

<?php include "../HeaderKandyness/HeaderKandyness.php";
    $row = selecionarLoja($idLoja);
    foreach($row as $value=>$result):
        $nomeLoja = $result['nome'];
        $descLoja = $result['descricao'];
        
?>
<div class="formContainer">
        <form id="editLoja" method="post" enctype="multipart/form-data" action="updateMinhaLoja.php">
            <input type="hidden" value="<?php echo $matricula ?>"name="matricula" >
            <h1>Editar Loja</h1>
            <div class="control" style="margin-top: 30px;">
                <label id="lbNomeLoja" for="nomeLoja"></label>
                <input type="text" placeholder="<?php echo $nomeLoja ?>" name="nomeLoja" id="nomeLoja">
                <div style="margin-bottom: 30px;" class="errors" id="errNomeLoja"></div>
            </div>
            
            <label id="lbDesc" for="descDiv"></label>
            <div class="control" name="descDiv">
                <textarea name="desc" id="desc" placeholder="<?php echo $descLoja ?>" rows="3" maxlength="100"></textarea>
                <div class="errors" id="errDesc"></div>
            </div>
            
            
            <div class="control">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
    <?php endforeach; ?>
</body>

<script>
    const form = document.getElementById("editLoja")
    const nomeLoja = document.getElementById("nomeLoja")
    const desc = document.getElementById("desc")

    const errNomeLoja = document.getElementById("errNomeLoja")
    const errDesc = document.getElementById("errDesc")

    form.addEventListener("submit",(e) => {
                clearErrors([errNomeLoja,errDesc])
                let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
                if(nameRegex.test(nomeLoja.value)){
                        e.preventDefault()
                        errNomeLoja.innerHTML += "- O nome da loja só pode conter letras! <br>"  
                        }
                if(nomeLoja.value.length < 3){
                        e.preventDefault()
                        errNomeLoja.innerHTML += "- O nome da loja precisa conter pelo menos 3 caracteres! <br>"
    
                        }
                if(desc.value.length < 5){
                        e.preventDefault()
                        errDesc.innerHTML += "- A descrição precisa conter pelo menos 5 caracteres! <br>"
                        }
            })

    function clearErrors(errors){
        errors.forEach(error => {
            error.innerHTML = ""
        })
    }
</script>