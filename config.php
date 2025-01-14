<?php
// Exibe erros apenas no ambiente de desenvolvimento
@ini_set('display_errors', '1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

// Configuração do banco de dados
$server = "localhost:3306";
$username = "root";
$password = ""; // Adicione sua senha aqui, se necessário
$database = "rifa";

// Conexão com o banco de dados
$conn = new mysqli($server, $username, $password, $database);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
