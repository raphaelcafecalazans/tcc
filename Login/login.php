<!DOCTYPE html>
<?php
	session_start();
?>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Login</title>

		<link rel = "stylesheet" type = "text/css" href = "../css/estiloLogin.css"/>
		<link rel = "stylesheet" type = "text/css" href = "../css/estiloLoginMob.css"/>

		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->		
	</head>
	<body>
		


		<?php
		
		if (isset($_SESSION['msgcad']))
		{
			echo $_SESSION['msgcad'];
			unset ($_SESSION['msgcad']);
			//unset destroi a variavel especificada.
		}
		?>

		<a href = "../index.php"><div id = "back"></div></a>
		
		<div id = "quadro"></div>

		<div id = "contentForm">	
			<h1><center>Log<font color="#CD0000">in.</font></center></h1>
			
			<!--Deslogado msg-->
			<?php
				if(isset($_SESSION['msgDeslog'])):
			?>
			<div id = "msgContent">
				<p align = "center">Deslogado com sucesso!</p>
			</div>
			<?php 
				endif;
				unset($_SESSION ['msgDeslog']);
			?>
			<!--Caso a senha esteja errada-->

			<?php 
				if(isset($_SESSION ['msgSV'])):
			?>
			<div id = "msgContent">
				<p align = "center">Usuário ou senha incorretos!</p>
			</div>
			<?php 
				endif;
				unset($_SESSION ['msgSV']);
			?>

			<!--Caso o usuario e a senha estejam errados-->

			<?php 
				if(isset($_SESSION ['msgUSV'])):
			?>
			<div id = "msgContent">
				<p align = "center">Usuário e senha não identificados!</p>
			</div>
			<?php 
				endif;
				unset($_SESSION ['msgUSV']);
			?>

			<!--Caso o usuario tente acessar paginas sem estar logado-->
			
			<?php 
				if(isset($_SESSION ['msgAR'])):
			?>
			<div id = "msgContent">
				<p align = "center">Área restrita apenas para usuários logados!</p>
			</div>
			<?php 
				endif;
				unset($_SESSION ['msgAR']);
			?>

			<form method="post" action="valida.php">		
				<input type='text' name='usuario' id='usuario' placeholder='Digite o Usuário' /><br /><br />
				<input type='password' name='senha' id='senha' placeholder='Digite a Senha' /><br><br>

				<div id = "btn">
					<input type='submit'name='btnLogin' value='Entrar' /><br /><br />
				</div>
			</form>

			<p align = "center" id = "pCadastro">Ainda não tem uma conta? <a href='cadastro.php'>Crie uma!</a></p>
			
			<p align = "center" id = "pEsque">Esqueceu usuario ou senha? <a href='esqueceuSenha.php'>Click aqui!</a></p>
		</div>
	</body>
</html>