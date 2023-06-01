<?php
$servername = 'localhost';
$username = 'root';
$password = '123456';
$bd = 'Kandyness';


$conn = new mysqli($servername, $username, $password, $bd);


if($conn->connect_error){
    die('Erro ao tentar se conectar: ' . $conn->connect_error);
}

?>