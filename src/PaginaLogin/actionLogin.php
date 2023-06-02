<?php 
session_start();
require "../dbConnection/queries.php";

$matricula = $_POST['matricula'];
$password = $_POST['password'];

$row = selectUsers($matricula);
if(isset($row)){
    foreach($row as $value=>$result):
    $selectMatricula = $result['matricula'];
    $selectPassword = $result['senha'];
    $nome = $result['nome'];
    $vendedor = $result['vendedor'];
    $cpf = $result['cpf'];
    if($selectMatricula == $matricula && $selectPassword == $password){
        $_SESSION['nome'] = $nome;
        $_SESSION['matricula'] = $selectMatricula;
        $_SESSION['vendedor'] = $vendedor;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['carrinho'] = [];
        if($vendedor == 1){
            $_SESSION['idLoja'] = selectIdDaLoja($matricula);
        }
        header("location:http://localhost/webProjects/KandyNess/src/PaginaVendedores/vendedores.php");
        
    }else{
        echo "senha incorreta"; // fazer lógica para retornar ao front end
    }
    endforeach;
}else{
    echo "Não há usuarios cadastrados";
}


?>