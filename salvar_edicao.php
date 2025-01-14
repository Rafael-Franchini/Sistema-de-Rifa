<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $situacao = $_POST['situacao'];

    // Prepara a consulta para salvar a edição no banco de dados
    $stmt = $conn->prepare("UPDATE tabela SET nome = ?, numero = ?, situacao = ? WHERE numero = ?");
    $stmt->bind_param("sssi", $nome, $numero, $situacao, $id);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Edição realizada com sucesso!";
        // Redireciona após a edição
        header("Location: index.html");
        exit();
    } else {
        echo "Erro ao editar os dados.";
    }

    $stmt->close();
    $conn->close();
}
?>
