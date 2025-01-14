<?php
require 'config.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null && is_numeric($id)) {
    $id = (int) $id;

 
    $stmt = $conn->prepare("DELETE FROM tabela WHERE numero = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir o registro: " . $stmt->error;
    }

 
    $stmt->close();
} else {
    echo "ID inválido ou não fornecido.";
}
$conn->close();
header("Location: index.html");
exit();
?>
