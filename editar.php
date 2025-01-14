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
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Editar</title>
    <style>
        /* Adicionando estilos para melhorar a aparência do formulário */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .form-container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Editar Registro</h2>
        <form id="form1" name="form1" method="post" action="salvar_edicao.php">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome" value="<?php echo htmlspecialchars($dados["nome"]); ?>"/></td>
                </tr>
                <tr>
                    <td>Número:</td>
                    <td><input type="text" name="numero" value="<?php echo htmlspecialchars($dados["numero"]); ?>"/></td>
                </tr>
                <tr>
                    <td>Situação:</td>
                    <td><input type="text" name="situacao" value="<?php echo htmlspecialchars($dados["situacao"]); ?>"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="submit" value="Gravar Edição"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
