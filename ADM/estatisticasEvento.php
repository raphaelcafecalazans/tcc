<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Estatísticas</title>
		
		<!-- dando o local do JS para o site usar -->
		<script src="https://chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
		<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
		<style>
		
		canvas{
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		</style>
		<?php
		
		$id = $_GET['id'];
		
		// dando ao php um local para ele basear o date
		date_default_timezone_set('America/Sao_Paulo');
		
		//adicionando ao banco de daods
		include_once('../Conexao/conexao.php');
		
		//iniciando session 
		session_start();
		
		//criando a variavel mes com o mes atual
		$mes = date('m');
		
		//criando a variavel com o ano atual 
		$ano = date('Y');
		
		// jogando o valor do mes em uma sessão 
		$_SESSION['mes'] = $mes;
		//jogando o valor do ano em uma sessão 
		$_SESSION['ano'] = $ano;
		
		
		
		
		?>
		
		
		
		
	</head>

	<body>
	<!-- criando um radio par a seleção de grafico-->
		<div style="width:75%;">
			<canvas id="canvas1"></canvas>
		</div>
		<script>
		
		
		// criando uma variavel em js que esta recebendo a data 
		var dt = new Date();
		
		// pegando a variavel mes da data
		var mes = dt.getMonth();
		
		// selecionando o mes para apresentar dependendo do mes apresentado 
		switch(mes) {
		  case 0:
			mes="janeiro"
			break;
		  case 1:
			mes = "fevereiro"
			break;
		  case 2:
			mes = "Março"
			break;
		  case 3:
			mes = "Abril"
			break;
		  case 4:
			mes = "Maio"
			break;
		  case 5:
			mes = "Junho"
			break;
		  case 6:
			mes = "Julho"
			break;
		  case 7:
			mes = "Agosto"
			break;
	      case 8:
			mes = "Setembro"
			break;
		  case 9:
			mes = "Outubro"
			break;
		  case 10:
			mes = "Novembro"
			break;
		  case 11:
			mes = "DEzembro"
			break;
		}
		
		
			
			var config1 = {
				//tipo de grafico
				type: 'line',
				//dados do grafico
				data: {
				//a lebel adiciona informações que ficam em baixo da tabela
					 labels:
							[
							//pegando as informações do banco de dados
							<?php 
							//denominando o mes de hoje
								$mes = date('m');
	
								//selecionando todos os dias deste mes e mandando para uma variavel
								$contatudot = "SELECT Day(DataEst) FROM tbl_estatisticas WHERE month(DataEst) = ".$_SESSION['mes']." and year(DataEst) = '".$_SESSION['ano']."' and Id_evento = '$id' ORDER BY 'DataEst'";
								
								//usando a query para executar o $contatudot
								$contatudo = mysqli_query($conecta,$contatudot);
								
								//contando quantas linhas tem nas especificações passadas pelo conta tudo 
								$linhas = mysqli_num_rows($contatudo);
								
								//printa todos os dias salvos até 
								while($linhas = mysqli_fetch_array($contatudo)){
								echo "'".$linhas['Day(DataEst)']."', ";
								}?>
							],
					
						// as informações que vão estar nas linhas
				datasets: [{
									// label titulo da linha 
									label: 'Acessos',
									//cor do fundo| dos circulos deas linhas
									backgroundColor:'transparent',
									
									//cor das linhas				
									borderColor: window.chartColors.red,
													//informações da tabela
													
													//Tamanho da linha
									borderWidth: 6,
									
											//data serve para inserir os dados que vão na tabela		
									data: [<?php 
											$mes = date('m');
						
											//repetindo o mesmo processo de cima porem com os dados da tabela
											$contatudot = "SELECT Acessos FROM tbl_estatisticas WHERE month(DataEst) = ".$_SESSION['mes']." and year(DataEst) = '".$_SESSION['ano']."' and Id_evento = '$id' ORDER BY 'DataEst'";
														
											$contatudo = mysqli_query($conecta,$contatudot);
														
											$linhas = mysqli_num_rows($contatudo);
													
											while($linhas = mysqli_fetch_array($contatudo)){
												echo "'".$linhas['Acessos']."', ";
													}?>
											],
											fill:false,
											},
									{
									label: 'Querem receber',
									fill: false,
									backgroundColor: 'transparent',
									borderColor: window.chartColors.blue,
									borderWidth: 6,
									data: [<?php 
											$mes = date('m');
						
											$contatudot = "SELECT Enviar FROM tbl_estatisticas WHERE month(DataEst) = ".$_SESSION['mes']." and year(DataEst) = '".$_SESSION['ano']."' ORDER BY 'DataEst'";
														
											$contatudo = mysqli_query($conecta,$contatudot);
														
											$linhas = mysqli_num_rows($contatudo);
													
											while($linhas = mysqli_fetch_array($contatudo)){
											echo "'".$linhas['Enviar']."', ";
											}?>
										  ],
									},

						]
				},
				
				
				
				
				//opções de customização da tabela
				options: {
				//resposinsivo para celular
					responsive: true,
					title: {
						display: true,
						//tamanho da fonte
						fontSize:20,
						//titulo da tabela
						text: 'Pessoas que vizitaram seu site'
					},
					//estilo da fonte da tavbela
					labels:{
					fontStyle:"Comic Sans"
					
					}, 
					
					
					//opções de escala da tabela 
					scales: {
					//nome da linha X da tabela (horizontal)
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: mes,
							}
						}],
						//nome da linha Y da tabela (vertical)
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Pessoas'
							}
						}]
					}
					
				
				}
				
				
			};
			


			//criando a função que gera as tebelas
			window.onload = function() {
			//variavel contexto pegando todo elemento com id canvas sendo ele 2d
					var ctx1 = document.getElementById('canvas1').getContext('2d');
					window.myLine = new Chart(ctx1, config1);
					
					
			};		
		</script>		

		
	</body>

</html>
