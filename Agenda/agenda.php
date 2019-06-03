<!DOCTYPE html>
<?php
	include_once('../Conexao/conexao.php');
	$pesquisa = "SELECT Id_agenda, Nome_agenda,Inicio_agenda, Final_agenda FROM Tbl_agenda";
	$resultado = mysqli_query($conecta,$pesquisa);
	$linhas = mysqli_num_rows($resultado);
	//conta quantas linhas tem na variavel resultado.
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Agenda</title>
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	<div class ='container'>
		<h1><center>Agenda de compromissos</center></h1>
		<?php
		while($linhas = mysqli_fetch_array($resultado))
		{
			//ele busca linha por linha e vai comparar com a contagem
		?>
			<a href='visualizarAgenda.php?&id=<?php echo $linhas['Id_agenda'];?> '> <?php echo $linhas['Nome_agenda'];?></a> 
			<br>
		<?php 		
			echo "================================= <br>";
			echo substr($linhas['Inicio_agenda'],8,2),
			substr($linhas['Inicio_agenda'],4,4),
			substr($linhas['Inicio_agenda'],0,4)," ---------------------------- ";
			echo substr($linhas['Final_agenda'],8,2),
			substr($linhas['Final_agenda'],4,4),
			substr($linhas['Final_agenda'],0,4),"<br>";
			echo substr($linhas['Inicio_agenda'], 11,5) ," -------------------------------------- ";
			echo substr($linhas['Final_agenda'], 11,5),"<br>";
			echo "================================= <br>";
		}
			
	?>
	<a href='cadastrarAgenda.php'><button type="button" class="btn btn-info">Cadastrar</button></a>
	</div>
  </body>
</html>
	