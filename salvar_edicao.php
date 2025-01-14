<?php
require 'config.php';
$nome = trim($_POST["nome"]);
$situacao = trim($_POST["situacao"]);$numero = $_POST["numero"];
settype($numero, "integer");
if (!empty($nome) && !empty($situacao) && $numero > 0) {
    $stmt = $conn->prepare("UPDATE tabela SET nome = ?, situacao = ? WHERE numero = ?");
    $stmt->bind_param("ssi", $nome, $situacao, $numero);
    if ($stmt->execute()) {
        header("Location: index.html");
        exit();
    } else {
        echo "Erro ao atualizar o registro: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Dados inválidos. Por favor, preencha todos os campos corretamente.";
}
$conn->close();
?>
<!DOCTYPE html>