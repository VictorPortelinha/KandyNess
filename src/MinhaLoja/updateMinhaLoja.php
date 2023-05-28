<?php
require "";
if (isset($_POST)){
    $matricula = $_POST['matricula'];
    $nomeLoja = $_POST['nomeLoja'];
    $descLoja = $_POST['desc'];
    $imgLoja = $_FILE['imgLoja'];
    $idLoja = selectIdDaLoja($matricula);
    
}




?>
