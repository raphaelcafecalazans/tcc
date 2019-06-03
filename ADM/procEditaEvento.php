<?php
session_start();
include_once('../Conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	<meta charset="utf-8">
	</head>
<?php
echo "<script>
		function redirecionar(){
		location.href='vizualizarEvento.php?&id=".$_SESSION['idE']."';
	}
	 </script>";



$nome = $_POST['nomeEvento'];
$inicio = $_POST['inicioEvento'];
$final = $_POST['finalEvento'];
$descricao = $_POST['descricaoEvento'];
$imagem	= $_FILES['imagem']['name'];
$imagemA = $_POST['imgAntiga'];

if($inicio== ""){
	$inicio = $_SESSION['inicio'];
}

if($final == ""){
	$final = $_SESSION['final'];
}

if($imagem == ""){
	$query =" UPDATE `tbl_eventos` SET 
	`Nome_evento`='$nome',
	`Data_inicio`='$inicio',
	`Data_termino`='$final',
	`Descricao_evento`='$descricao',
	`Evento_imagem`='$imagemA'
	WHERE Id_evento = '".$_SESSION['idE']."'
	";
	mysqli_query($conecta,$query);
	echo "<script>
	redirecionar()
	</script>
	";
	
}else{
				
		//pasta para onde você quer mandar os arquivo
		$_UP['pasta'] = '../img/imgEve/';

		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = 1024*1024*100; //5mb

		//Array com as extensoes permitidas
		$_UP['extensoes'] = array('png','jpg', 'jpeg', 'gif');

		//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
		$_UP['renomeia'] = false;

		//Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

		//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
		if($_FILES['imagem']['error'] != 0){
			die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem']['error']]);
			exit; //Para a execução do script
		}

		//Faz a verificação da extensao do arquivo
		$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
		if(array_search($extensao, $_UP['extensoes'])=== false){
			$query = "UPDATE `tbl_eventos` SET 
			`Nome_evento`='$nome',
			`Data_inicio`='$inicio',
			`Data_termino`='$final',
			`Descricao_evento`='$descricao',
			WHERE Id_evento = '".$_SESSION['idE']."";
			$envia = mysqli_query($conecta,$query);
			echo "
				<script type=\"text/javascript\">
					alert(\"Imagem não enviada por favor envie arquivos como as seguintes extensões: png, jpg, jpeg e gif, porem as informaçãoes foram cadastradas.\");
					redirecionar()
				</script>
			";
		}//faz verificação do tamanho do arquivo
		else if($_UP['tamanho'] < $_FILES['imagem']['size']){
			$query = "UPDATE `tbl_eventos` SET 
		`Nome_evento`='$nome',
		`Data_inicio`='$inicio',
		`Data_termino`='$final',
		`Descricao_evento`='$descricao',
		`Evento_imagem`='$imagemA'
		WHERE Id_evento = '".$_SESSION['idE']."'";
		
			$envia = mysqli_query($conecta,$query);
			echo 
						"<script type=\"text/javascript\">
							alert(\"imagem maior que o limite permitido de 2mg, dados cadastrados\");
							redirecionar()
						</script>";
		}// passou as verificações, movendo para a pasta foto
		else{
			//verifica se deve trocar o nome do arquivo
			if($_UP['renomeia'] == true){
				//cria um nome baseado no tempo atual
				$nome_final = time().'.jpg';
			}else{
				//matem o nome original do arquivo
				$nome_final = $_FILES['imagem']['name'];
			}
			//verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'].$nome_final)){
				//upload efetuado com sucesso
				$query =" UPDATE `tbl_eventos` SET 
				`Nome_evento`='$nome',
				`Data_inicio`='$inicio',
				`Data_termino`='$final',
				`Descricao_evento`='$descricao',
				`Evento_imagem`='$nome_final'
				WHERE Id_evento = '".$_SESSION['idE']."'
				";
				$envia = mysqli_query($conecta,$query);
				echo "
				<script type=\"text/javascript\">
					alert(\"Evento cadastrado com sucesso\");
					redirecionar()
				</script>
			";
			}else{
				echo "
				<script type=\"text/javascript\">
					alert(\"Evento não cadastrado com sucesso\");
					redirecionar()
				</script>
			";
			}
		}
}



