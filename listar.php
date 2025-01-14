<?php
require 'config.php';
$resultado = $conn->query("SELECT * FROM tabela ORDER BY numero");
$resultadop = $conn->query("SELECT * FROM tabela WHERE situacao='PAGO'");
$total = $resultado->num_rows;
$totalp = $resultadop->num_rows;
$valor = $total * 5;

$valor2 = $totalp * 5;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Sistema de Rifa</title>
    <style>
        table {
            font-family: Tahoma, Arial, sans-serif;
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .summary {
            font-family: Tahoma, Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="summary">
        <p>Total de registros: <?= $total; ?></p>
        <p>Total de rifas vendidas: R$ <?= number_format($valor, 2, ',', '.'); ?></p>
        <p>Total de rifas pagas: R$ <?= number_format($valor2, 2, ',', '.'); ?></p>
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
                    <td>
                        <a href="editar.php?id=<?= $linha["numero"]; ?>">[Editar]</a> |
                        <a href="excluir.php?id=<?= $linha["numero"]; ?>">[Excluir]</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Nenhum registro encontrado.</p>
    <?php endif; ?>

    <?php
    $resultado->free();
    $resultadop->free();
    $conn->close();
    ?>
</body>
</html>
```