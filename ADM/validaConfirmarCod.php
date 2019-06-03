<?php
	session_start();

	$codigo = $_POST['Ccodigo'];
	
	if($_SESSION['senha'] == $codigo){
		?>
		<script>
		location.href = '../ADM/trocarSenha.php';
		</script>
		<?php
	}else{
		?>
		<script>
			alert("codigo errado!");
			location.href='../ADM/confirmarCodigo.php';
		</script>
		<?php
	}

?>