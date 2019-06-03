<?php
	
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "administrativo"; 
	
	$mysqli = new mysqli($host, $usuario, $senha, $bd);
	//criando a conexão com BD
	if($mysqli -> connect_errno)
		echo "Falha na conexão: (".$mysqli -> connect_errno.") ".$mysqli -> connect_error;
	

?>