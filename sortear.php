<?php
	$server="localhost:3306";
	$username="root";
	$conn = new mysqli($server,$username,"");
	mysqli_select_db($conn,"rifa");
	$resultadop = mysqli_query($conn,"select * from tabela where situacao='PAGO'");
	$total=mysqli_num_rows($resultadop);
	mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
</head>
<body>
	<?php 
    function sortear(){
        $gera = rand(1,150);
        $server="localhost:3306";
	    $username="root";
        $conn = new mysqli($server,$username,"");
	    mysqli_select_db($conn,"rifa");
        $resultadogera = mysqli_query($conn,"select * from tabela where numero='$gera'");
        $linha = mysqli_fetch_array($resultadogera);
        mysqli_close($conn);
        if(mysqli_num_rows($resultadogera)==1){ 
            $numero = $linha["numero"];
            $nome = $linha["nome"];
            $situacao = $linha["situacao"];
            if($situacao =='PENDENTE'){
                return 0;
            }else{
                echo("O numero sorteado foi $gera");
                echo "<br>";
                echo $nome;
                echo "<br>";
                echo $numero;
                echo "<br>";
                echo $situacao;
                echo "<br>";
                return 1;
            }
        }else{
            return 0;
        }
    };
    do{}while(sortear()==0);
    
    ?>
</body>
</html>