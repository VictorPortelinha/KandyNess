<?php 
session_start();
require "../dbConnection/queries.php";

$matricula = $_POST['matricula'];
$password = $_POST['password'];
$_SESSION['erroMatricula'] = '';
$_SESSION['senhaIncorreta'] = '';
$row = selectUsers($matricula);
if($row == false){
    $_SESSION['erroMatricula'] = "Usuario não encontrado, tente novamente";
}

if(isset($row)){
    foreach($row as $value=>$result):
    $selectMatricula = $result['matricula'];
    $selectPassword = $result['senha'];
    $nome = $result['nome'];
    $vendedor = $result['vendedor'];
    $cpf = $result['cpf'];
    if($selectMatricula == $matricula && $selectPassword == $password){
        $_SESSION['erroMatricula'] = '';
        $_SESSION['senhaIncorreta'] = '';
        $_SESSION['nome'] = $nome;
        $_SESSION['matricula'] = $selectMatricula;
        $_SESSION['vendedor'] = $vendedor;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['carrinho'] = [];
        if($vendedor == 1){
            $_SESSION['idLoja'] = selectIdDaLoja($matricula);
            $idLoja = $_SESSION['idLoja'];
            header('location:http://localhost/webProjects/KandyNess/src/PaginaProdutos/produtos.php?idloja='.$idLoja);
        }else{
            $_SESSION['idLoja'] = -1;
            header("location:http://localhost/webProjects/KandyNess/src/PaginaVendedores/vendedores.php");
        }
        
        
    }elseif($selectPassword != $password){
        $_SESSION['senhaIncorreta'] = "Senha incorreta, tente novamente!";
        echo "tchau";
    }
    endforeach;

}
if($_SESSION['erroMatricula'] != '' || $_SESSION['senhaIncorreta'] != ''){
    header("location:http://localhost/webProjects/KandyNess/src/PaginaLogin/login.php");
}


?>