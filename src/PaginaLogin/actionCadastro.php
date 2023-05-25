<?php
require "../dbConnection/queries.php";

$nome = $_POST['name'];
$matricula = $_POST['matricula'];
$password = $_POST['password'];
$cpf = $_POST['cpf'];
$userType = $_POST['userType'];

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