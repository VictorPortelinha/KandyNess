<?php session_start();
if(!isset($_SESSION['compraFinalizada'])){
  header("location:http://localhost/webProjects/KandyNess/src/PaginaLogin/login.php");
}

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/compraFinalizada.css">
</head>
<body>
    <?php include "../HeaderKandyness/HeaderKandyness.php" ?>
    <div class="messageContainer">
        <h1 class="green"  >

        <?php if($_SESSION['compraFinalizada'] == 0){
          $_SESSION['carrinho'] = array();
           ?>
        <span><?php echo "Compra finalizada com sucesso" ?></span>
        <?php }  ?>
            
        </h1>
        <h1 class="red">
          <?php if($_SESSION['compraFinalizada'] == 1){
              for($i = 0;$i<count($_SESSION['erros']);$i++){ ?>
              <span> <?php echo $_SESSION['erros'][$i] ?></span>
              <br>
              <?php 
              $_SESSION['carrinho'] = array();
              }} ?>
        </h1>
        <?php $_SESSION['erros'] = [] ?>
        
    </div>
</body>
</html>
