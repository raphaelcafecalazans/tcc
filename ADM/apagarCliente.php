<!DOCTYPE html>
<?php
	
	include_once('../Seguranca/seguro.php');
	include_once('../Conexao/conexao.php');	
	ob_start();
	
	
	$idC=$_GET['id'];
	$consulta1= "DELETE FROM tbl_estatisticas WHERE Id_cliente = ".$idC."";	
	$consulta2= "DELETE FROM tbl_subcliente WHERE Id_cliente = ".$idC."";	
	$consulta3= "DELETE FROM tbl_eventos WHERE Id_cliente = ".$idC."";	
	$consulta4= "DELETE FROM tbl_cliente WHERE Id_cliente = ".$idC." LIMIT 1";
	
	$resultado1 = mysqli_query($conecta, $consulta1);
	$resultado2 = mysqli_query($conecta, $consulta2);
	$resultado3 = mysqli_query($conecta, $consulta3);
	$resultado4	= mysqli_query($conecta, $consulta4);
	
	//executando a consulta no BD
	$linhas = mysqli_affected_rows($conecta);
	// vendo se alguma linha foi afetada no banco de dados
	
	if ($linhas == 1)
	{
		echo "<script>
			alert ('Apagado com sucesso!');
			location.href='../ADM/listaCliente.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert ('ERRO!');
			location.href='../ADM/visualizarCliente.php?&id=".$idC."'
			</script>";
	}

	?>