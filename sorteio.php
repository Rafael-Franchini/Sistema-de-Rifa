<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'config.php';

// Verificando se há erro na conexão
if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Função para realizar o sorteio
function sortear($conn) {
    $gera = rand(1, 150);
    $sql = "SELECT * FROM tabela WHERE numero='$gera'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $linha = $result->fetch_assoc();
        $numero = $linha["numero"];
        $nome = $linha["nome"];
        $situacao = $linha["situacao"];

        if ($situacao == 'PENDENTE') {
            return false;
        } else {
            return [
                'success' => true,
                'numero' => $numero,
                'nome' => $nome,
                'situacao' => $situacao
            ];
        }
    } else {
        return false;
    }
}

do {
    $resultado = sortear($conn);
} while ($resultado === false);

$conn->close();

// Verificando se o resultado está correto antes de retornar como JSON
if ($resultado) {
    echo json_encode($resultado); // Retorna o resultado como JSON
} else {
    echo json_encode(['error' => 'Nenhum vencedor encontrado']);
}
?>
