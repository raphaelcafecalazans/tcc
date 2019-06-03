<!DOCTYPE html>
<html>
	<head>
		<title>Confirmar email</title>
		<link rel="stylesheet" type="text/css" href="../css/estiloConfirmarCodigo.css">
		<link rel="stylesheet" type="text/css" href="../css/estiloConfirmarCodigoMob.css">
	<head>
	<body>

		<a href = "../Login/esqueceuSenha.php"><div id = "back"></div></a>

		<div id="quadro"></div>

		<div id = "centro">
			<h2>CONFIRMAÇÃO DE CÓDIGO</h2>

			<form method="post" action ='validaConfirmarCod.php'>
				<p>Enviamos um codigo para o seu email.<br id = "mobNone"> Confirme:</p>

				<p><input type='text' name='Ccodigo' id='Ccodigo' placeholder='Digíte a código recebido' required/></p>

				<p><input type='submit'name='btnEnviar' value='Entrar'/></p>
			</form>
		</div>
	</body>
</html>