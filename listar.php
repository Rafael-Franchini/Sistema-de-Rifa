<?php
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	$server="localhost:3306";
	$username="root";
	$conn = new mysqli($server,$username,"");
	mysqli_select_db($conn,"rifa");
	$resultado = mysqli_query($conn,"select * from tabela order by numero");
	$total=mysqli_num_rows($resultado);
	mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
</head>
<body>
	<?php if(mysqli_num_rows($resultado) < 1){ exit; } ?>
	<table style="font-family:tahoma;margin-top:20px;" width="500" " align="center">
		<tr>
			<th>Numero</th><th>Nome</th><th>Situacao</th><th>Editar/Excluir</th>
		</tr>
	<?php 
	$valor=$total*5;
	echo("$total rifas vendidas total R$ $valor,00");
	
	while($linha = mysqli_fetch_array($resultado)){
		$numero = $linha["numero"];
		$nome = $linha["nome"];
		$situacao = $linha["situacao"];
		echo"
		<tr>
			<td>$numero</td><td>$nome</td><td>$situacao</td>
			<td><a href=\"editar.php?id=$numero\">[Editar]</a>
			| <a href=\"excluir.php?id=$numero\">[Excluir]</a></td>
		</tr>\n";
	}?>
	</table>
</body>
</html>




