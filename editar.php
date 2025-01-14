<?php
// Inclui o arquivo de configuração
require 'config.php';

// Verifica se o ID foi passado por GET e valida
$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id !== null && is_numeric($id)) {
    $id = (int) $id; // Garante que o ID seja um número inteiro

    // Prepara a consulta para pegar os dados do registro
    $stmt = $conn->prepare("SELECT * FROM tabela WHERE numero = ?");
    $stmt->bind_param("i", $id); // O "i" indica que o parâmetro é um inteiro
    $stmt->execute();

    // Obtém o resultado
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_array(MYSQLI_ASSOC);

    // Fecha a consulta
    $stmt->close();
} else {
    echo "ID inválido ou não fornecido.";
    exit();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<!DOCTYPE html>
<head><title>Editar</title><meta charset="utf-8"/></head>
<body>
    <form id="form1" name="form1" method="post" action="salvar_edicao.php">
        <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
        <table width="440" border="1" align="center">
            <tr>
                <td width="165">Nome</td>
                <td width="380"><input name="nome" type="text" id="nome"
                value="<?php echo htmlspecialchars($dados["nome"]);?>"/></td>
            </tr>
            <tr>
                <td>Numero</td>
                <td><input name="numero" type="text" id="numero"
                value="<?php echo htmlspecialchars($dados["numero"]);?>"/></td>
            </tr>
            <tr>
                <td>Situação</td>
                <td><input name="situacao" type="text" id="situacao"
                value="<?php echo htmlspecialchars($dados["situacao"]);?>"/></td>
            </tr>
            <tr>
                <td>Ação:</td>
                <td><input type="submit" name="submit" value="Gravar" 
                style="cursor:pointer"/></td>
            </tr>
        </table>
    </form>
</body>
</html>
