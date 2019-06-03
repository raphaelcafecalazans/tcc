<?php
session_start();

include_once('../Conexao/conexao.php');	

	$dadosrecebidos = filter_input_array(INPUT_POST, FILTER_DEFAULT);	

	$query = "UPDATE Tbl_cliente SET Nome_cliente ='".$dadosrecebidos['nome']."', 
					   Email_cliente = '".$dadosrecebidos['email']."',
					   Telefone_cliente = '".$dadosrecebidos['telefone']."',
					   Celular_cliente = '".$dadosrecebidos['celular']."',
					   Segmento_cliente = '".$dadosrecebidos['segmento']."'
					   WHERE Id_cliente = '".$dadosrecebidos['id']."' ";
	
	$resultado = mysqli_query($conecta,$query);
	
	if($resultado)
	{
		echo "<script>
			alert ('Inserido com sucesso!');
			location.href='../ADM/listaCliente.php';
			</script>";
	}
	else 
	{
		echo "<script>
			alert ('ERRO!');
			</script>";
	}
			
?>