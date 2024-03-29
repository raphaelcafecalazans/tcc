<?php
	include_once('../Seguranca/seguro.php');
	include_once('../Conexao/conexao.php');
	$idusuario = $_SESSION['id'];
	$pesquisa = "SELECT * FROM Tbl_cliente WHERE Id_usuario = '$idusuario' ORDER BY 'Id_cliente'";
	//criando o parametro de busca
	$resultado = mysqli_query($conecta,$pesquisa);
	//fazendo a busca no banco de dados
	
	$linhas = mysqli_num_rows($resultado);
	//conta quantas linhas tem na variavel resultado.
	
?>


<html>
<head>
	<meta charset='UTF-8'>
	<title>Clientes Cadastrados</title>

	<link rel = "stylesheet" type = "text/css" href = "../css/estiloListaCliente.css"/>
	<link rel = "stylesheet" type = "text/css" href = "../css/estiloListaClienteMob.css"/>

	<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenu.css"/>

	<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenuMob.css"/>

	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->

	<script>
		function confirmSair() {
		   if (confirm("Tem certeza que deseja sair?")) {
		      location.href="../Login/sair.php";
		   }
		}
	</script>

	<!--DataTable-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>


	<script type="text/javascript" src = "//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src = "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json"></script>

	<script>

		$(document).ready( function () {
		    $('#datatable').DataTable({
            	"language": {
                	"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            	}
        	} );;
		} );
	</script>

	<script>
		$(document).ready(function(){
			$('.botao').click(function(){
				$('.menuList li, .quadroTransp').toggle();
			});
		});
	</script>

</head>
<body id = "listaCliente">

	<div id = "menu">
		<div id="content">
			<div class = "linkCentro">	
				
				<!--Aqui vira todos os links de ADM-->	
				<a href='../ADM/index.php' id = "areaAdministração">Area de administração</a> 
				<a href='../ADM/cadastroCliente.php' id = "cadastroCliente">Cadastrar Cliente</a> 
				<a href='../ADM/listaCliente.php' id = "listaCliente">Clientes Cadastrados</a> 

			</div>

			<input type = "submit" value = "Sair" onclick="confirmSair()"/>
		</div>
		
		<div id = "menuMob">
			<div class = "botao">
				<img src = "../img/logo/menuIcon.png">
			</div>

			<div class = "quadroTransp"></div>

			<div class = "menuList">
				<ul>
					<a href='index.php' class = "link"><li>Area de administração</li></a>
					<a href='cadastroCliente.php' class = "link"><li>Cadastrar Cliente</li></a>
					<a href='listaCliente.php' class = "link"><li>Clientes Cadastrados</li></a>
					
					<li><input type = "submit" value = "Sair" onclick="confirmSair()"/></li>
				</ul>
			</div>

		</div>
	</div>
		<?php if (($resultado) && ($resultado -> num_rows !=0)){?>
		<div id = "containerLista">	
		
				
			
			<table id = "datatable">

				<thead>
					<tr>
						<th>Nome</th>
						<th class = 'noneMob'>Email</th>
						<th class = 'noneMob'>Segmento</th>
						<th class = 'noneMob'>Estado</th>
						<th class = "thAcoes">Ações</th>
					</tr>
				</thead>
				<tbody>

					<?php
						while($linhas = mysqli_fetch_array($resultado))
						{
							//ele busca linha por linha e vai comparar com a contagem
							echo "<tr>";

								echo "<td>".$linhas['Nome_cliente']."</td>";
								echo "<td class = 'noneMob'>".$linhas['Email_cliente']."</td>";
								echo "<td class = 'noneMob'>".$linhas['Segmento_cliente']."</td>";
								echo "<td align = 'center' class = 'noneMob'>".$linhas['Uf_cliente']."</td>";

								?>
								
								<td class = "tdAcoes">

									<a class = "aBtn" href='../ADM/visualizarCliente.php?&id=<?php echo $linhas['Id_cliente'];?>'>
										<input type='button' name='btnVisualizar' value='Visualizar' class = "inputBtn" id = "btnVis"/>
									</a>

									<a class = "aBtn" href='../ADM/CadastroEvento.php?&id=<?php echo $linhas['Id_cliente'];?>'>
										<input type='button' name='btnCadEvento' value='Cadastrar Evento' class = "inputBtn" id = "btnEve"/>
									</a>

								</td>
								<?php
							echo "</tr>";
						}
				
					?>
				</tbody>
			</table>

		</div>
	<?php } else{ ?>
		
		<div id = "quadroP"></div>
		<div id = "centro">

			<p id = "pNCad">
				Nenhum cliente cadastrado:
				 
				<a href='../ADM/cadastroCliente.php' id = "cadastroCliente">
					<input type='button' name='btnCadCli' value='Cadastrar' id = "btnCad"/>
				</a>
			</p> 
		</div>
	
	<?php } ?>
</body>
</html>