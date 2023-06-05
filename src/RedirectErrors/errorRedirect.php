<?php 
session_start();
if(!isset($_SESSION['erros'])){
    header("location:http://localhost/webProjects/KandyNess/src/PaginaLogin/cadastro.php");
} ?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./erros/erro.css">
</head>

<body>
    <?php include "../HeaderKandyness/HeaderKandyness.php" ?> 
    <div class="messageContainer">
        <h1>
            <?php for($i = 0;$i<count($_SESSION['erros']);$i++){?>
            <span> <?php echo $_SESSION['erros'][$i] ?></span>
            <br>
            <?php } ?>
        </h1>
        <a href="../PaginaLogin/cadastro.php" >Voltar ao cadastro</a>
        <?php session_destroy(); ?>
    </div>
</body>

</html>