<?php
require "../dbConnection/queries.php";

$nome = $_POST['name'];
$matricula = $_POST['matricula'];
$password = $_POST['password'];
$cpf = $_POST['cpf'];
$userType = $_POST['userType'];

if($userType == 'vendedor'){
    echo 'ele é um vendedor';
    $userType = 1;
    insertIntoUsers($nome,$matricula,$password,$cpf,$userType);
    header('location:http://localhost/webProjects/KandyNess/src/PaginaLogin/cadastroLoja.php');
}else{
    echo 'ele não é um vendedor';
    $userType = 0;
    insertIntoUsers($nome,$matricula,$password,$cpf,$userType);
}



?>