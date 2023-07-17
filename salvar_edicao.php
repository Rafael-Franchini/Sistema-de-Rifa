<?php
	//Visibilidade dos erros
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	//construção da string de conexão.
	$server="localhost:3306";
	$username="root";
	$conn=new mysqli($server,$username,"");
	mysqli_select_db($conn,"rifa");
	
	$nome = $_POST["nome"];
	$situacao = $_POST["situacao"];
	$numero = $_POST["numero"];
	settype($numero,"integer");
	
	mysqli_query($conn,"UPDATE tabela SET nome='$nome',situacao='$situacao',
	numero='$numero' WHERE tabela.numero='$numero'");
	mysqli_close($conn);
	header("Location: index.html");
?>
	
	
	