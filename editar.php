<?php
	//Visibilidade dos erros
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	//construção da string de conexão.
	$server="localhost:3306";
	$username="root";
	$conn=new mysqli($server,$username,"");
	mysqli_select_db($conn,"rifa");
	$id = $_GET["id"];
	settype($id,"integer");
	$resultado = mysqli_query($conn,"select * from tabela where numero=$id");
	$dados = mysqli_fetch_array($resultado);
	mysqli_close($conn);
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
				value="<?php echo $dados["nome"];?>"/></td>
			</tr>
			<tr>
				<td>Numero</td>
				<td><input name="numero" type="text" id="numero"
				value="<?php echo $dados["numero"];?>"/></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input name="situacao" type="text" id="situacao"
				value="<?php echo $dados["situacao"];?>"/></td>
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
	
	





		