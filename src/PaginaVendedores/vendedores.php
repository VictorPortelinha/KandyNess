 <?php
session_start();
isset($_SESSION['matricula']);
if(isset($_SESSION['matricula'])){
    $lol;
}else{
    header('location:http://localhost/webProjects/KandyNess/src/PaginaLogin/cadastro.php');
}

 require_once "../dbConnection/queries.php";
 
 
 
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Área das lojas</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../PaginaVendedores/vendedoresStyles/vendedores.css">
        
    </head>
    <body>
        <?php include "../HeaderKandyness/HeaderKandyness.php" ?>
        
        <div class="cardGrid"><?php include "../Components/CardVendedor.php" ?></div>
        
        

        
        <script src="" async defer></script>
    </body>
</html>