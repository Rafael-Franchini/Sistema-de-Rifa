<?php
require 'config.php';
$numero = trim($_POST["numero"]); 
$nome = trim($_POST["nome"]);
$situacao = trim($_POST["situacao"]);
if (!empty($numero) && !empty($nome) && !empty($situacao)) {
    settype($numero, "integer");

    // Prepara a consulta para evitar injeção de SQL
    $stmt = $conn->prepare("INSERT INTO tabela (numero, nome, situacao) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $numero, $nome, $situacao);
    if ($stmt->execute()) {
        echo "Registro salvo com sucesso!<br><br>";
        header("Location: index.html");
        exit();
    } else {
        echo "Erro ao salvar o registro: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Erro: Todos os campos são obrigatórios.";
}
$conn->close();
?>
