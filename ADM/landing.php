<!DOCTYPE html>
<?php
	session_start();
	
	include_once('../Conexao/conexao.php');	
	
	$_SESSION['idE']  = $_GET['id'];
	
	$id = $_GET['id'];
	
	date_default_timezone_set('America/Sao_Paulo');

	$data = date ('Y-m-d');
	
	$ace = 1;
	
	$contar = "SELECT * FROM tbl_subcliente WHERE DataSub ='$data' and Receber = 1";
	$contarbus = mysqli_query($conecta,$contar);
	
	$numcon = $contarbus -> num_rows;
	
	if ($numcon==""){
		$rece =0;
	}else{
		$rece = $numcon;
	}
	
	
	
	$querybus = "SELECT * FROM tbl_estatisticas WHERE DataEst = '$data' and Id_evento = '$id'";
	$busca = mysqli_query($conecta,$querybus);
	
	if(($busca) AND ($busca -> num_rows != 0)){
		$query = "UPDATE `tbl_estatisticas` SET `Acessos`=`Acessos`+1,`Enviar`= '$rece' WHERE DataEst = '$data' and Id_evento = '$id'";
		$envia = mysqli_query($conecta,$query);
	}else{
		$query = "INSERT INTO tbl_estatisticas (Id_evento, DataEst,Acessos,Enviar,Id_cliente) VALUES ('$id','$data','ace','$rece','".$_SESSION['idC']."')";
		$envia = mysqli_query($conecta,$query);
	}
	

?>
<html>
	<head>
	<meta charset = "UTF-8">
	<title>Landing Page </title>
	</head>
	
	<body>
		<div>
			<form method = "post" action = "processaLanding.php" >
				Nome:<input type="text" name="nomeSubClit" id="nomeSubClit" placeholder="Digite seu nome" required><br>
				Email:<input type="email" name="emailSubClit" id="emailSubClit" placeholder="Digite seu E-mail" required><br>
				<input type="hidden" name="receber" value="0">
				<input type="checkbox" name="receber" value="1"> Eu gostaria de receber informações dos proximos eventos<br>
				<input type="submit">
			</table>
		</div>
		
	</body>
</html>