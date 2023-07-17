<?php
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$nome = $_POST["nome"];
	$situacao = $_POST["situacao"];
	$numero = $_POST["numero"];
	$server = "localhost:3306";
	$username = "root";
	$conn = new mysqli($server, $username,"");
	mysqli_select_db($conn, "rifa");
	mysqli_query($conn,"INSERT INTO tabela(numero, nome, situacao)
	VALUES ('$numero','$nome','$situacao')");
	mysqli_close($conn);
	header("Location: index.html");
	echo "Salvo com Sucesso <br></br>";
?>