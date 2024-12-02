<?php 

$dbHost = 'localhost'; 
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'agenda38'; 

// Criar a conexão
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}


?>
