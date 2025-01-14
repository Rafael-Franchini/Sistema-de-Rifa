<?php
require 'config.php';

$resultado = $conn->query("SELECT * FROM tabela ORDER BY numero");
$resultadop = $conn->query("SELECT * FROM tabela WHERE situacao='PAGO'");
$total = $resultado->num_rows;
$totalp = $resultadop->num_rows;
$valor = $total * 5; // Valor total das rifas vendidas
$valor2 = $totalp * 5; // Valor total das rifas pagas
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Sistema de Rifa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .summary {
            text-align: center;
            margin: 20px;
        }
        .summary p {
            font-size: 1.2rem;
            color: #333;
        }
        table {
            font-family: Tahoma, Arial, sans-serif;
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
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
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .actions a {
            color: #dc3545;
        }
        .actions a:hover {
            color: #c82333;
        }
    </style>
</head>
<body>

    <div class="summary">
        <p><strong>Total de registros:</strong> <?= $total; ?></p>
        <p><strong>Total de rifas vendidas:</strong> R$ <?= number_format($valor, 2, ',', '.'); ?></p>
        <p><strong>Total de rifas pagas:</strong> R$ <?= number_format($valor2, 2, ',', '.'); ?></p>
    </div>

    <?php if ($total > 0): ?>
        <table>
            <tr>
                <th>Número</th>
                <th>Nome</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
            <?php while ($linha = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($linha["numero"]); ?></td>
                    <td><?= htmlspecialchars($linha["nome"]); ?></td>
                    <td><?= htmlspecialchars($linha["situacao"]); ?></td>
                    <td class="actions">
                        <a href="editar.php?id=<?= $linha["numero"]; ?>">[Editar]</a> |
                        <a href="excluir.php?id=<?= $linha["numero"]; ?>">[Excluir]</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align: center; color: #888;">Nenhum registro encontrado.</p>
    <?php endif; ?>

    <?php
    // Libera a memória utilizada pela consulta
    $resultado->free();
    $resultadop->free();
    $conn->close();
    ?>

</body>
</html>
