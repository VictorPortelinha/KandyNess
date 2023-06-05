<?php
require "../dbConnection/queries.php";
session_start();
$nome = $_POST['name'];
$matricula = $_POST['matricula'];
$password = $_POST['password'];
$cpf = $_POST['cpf'];
$userType = $_POST['userType'];
$_SESSION['erros'] = [];
$row = selectAllUsers();
if(isset($row)){
    foreach($row as $value=>$result):
        
        $selectMatricula = $result['matricula'];
        $selectCpf = $result['cpf'];

        if($selectMatricula == $matricula){
            array_push($_SESSION['erros'],'Erro: matricula já cadastrada');
        }
        if($selectCpf == $cpf){
            array_push($_SESSION['erros'],'Erro: cpf já cadastrado');
        }
        
    endforeach;
    if($_SESSION['erros'] != []){
        header("location:http://localhost/webProjects/KandyNess/src/RedirectErrors/errorRedirect.php");
    }
}


if($userType == 'vendedor'){
    $userType = 1;
    $nomeLoja = $_POST['nomeLoja'];
    $descLoja = $_POST['desc'];
    
    insertIntoUsers($nome,$matricula,$password,$cpf,$userType);
    insertNewLoja($nomeLoja,$descLoja,$matricula);
    header('location:http://localhost/webProjects/KandyNess/src/PaginaLogin/login.php');
}else{
    $userType = 0;
    insertIntoUsers($nome,$matricula,$password,$cpf,$userType);
    header('location:http://localhost/webProjects/KandyNess/src/PaginaLogin/login.php');
}

    
    





?>