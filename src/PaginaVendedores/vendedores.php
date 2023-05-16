 <?php
 require_once "../dbConnection/queries.php";
 session_start();
 $matricula = 40002627;
 $nome = "Fabio Souza";
 $cpf = 12562984280;
 
 $_SESSION['matricula']= $matricula;
 $_SESSION['nome'] = $nome;
 $_SESSION['cpf'] = $cpf;
 $_SESSION['logado'] = true;
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../PaginaVendedores/vendedoresStyles/vendedores.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <?php include "../HeaderKandyness/HeaderKandyness.php" ?>
        
        <div><?php include "../Components/CardVendedor.php" ?></div>
        

        
        <script src="" async defer></script>
    </body>
</html>