<?php 
require "../dbConnection/queries.php";

$matricula = $_POST['matricula'];
$password = $_POST['password'];

$row = selectUsers();
if(isset($row)){
    foreach($row as $value=>$result):
    $selectMatricula = $result['matricula'];
    $selectPassword = $result['senha'];
    if($selectMatricula == $matricula && $selectPassword == $password){

        header('location:http://localhost/webProjects/KandyNess/src/PaginaVendedores/vendedores.php');
    }else{
        echo "senha incorreta";
    }
    endforeach;
}else{
    echo "Não há usuarios cadastrados";
}


?>