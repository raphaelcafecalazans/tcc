<!DOCTYPE html>
<?php include ("Conexao/conexao.php")?>
<html>
	<head>
		<title>Daily Clean</title>

		<!--Visualização Desktop-->
		<link rel = "stylesheet" type = "text/css" href = "css/estiloHome.css"/>

		<!--Visualização Mobile-->
		<link rel = "stylesheet" type = "text/css" href = "css/estiloHomeMob.css">

		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script>
			/*Funções para redirecionar os botões de cadastro e login*/
			function goCadastro() {
			    location.href="Login/cadastro.php";			   
			}

			function goLogin() {
			    location.href="Login/login.php";			   
			}

			$(document).ready(function(){
				$('.botao').click(function(){
					$('.menuList li, .quadroTransp').toggle();
				});
			});


		</script>

	</head>

	<body>
		<div class = "menuHome">

			<a href = "#"><img src = "img/logo/logo1.png"></a>

			<div id = "contentLink">
				<a href='index.php' class = "link">Home</a>
				
				
				<input type = "submit" value = "Cadastrar" class = "btnLink" id = "cadastro" onclick="goCadastro()"/>						
				<input type = "submit" value = "Logar" class = "btnLink" id = "login" onclick="goLogin()">
			</div>

			<div id = "menuMob">
				<div class = "botao">
					<img src = "img/logo/menuIcon.png">
				</div>

				<div class = "quadroTransp"></div>

				<div class = "menuList">
					<ul>
						<a href='index.php' class = "link"><li>Home</li></a>
						
						<a href='Login/cadastro.php' class = "link"><li>Cadastrar</li></a>
						<a href='Login/login.php' class = "link"><li>Logar</li></a>
					</ul>
				</div>

			</div>
						
		</div>

		<div id = "slider">

			<figure>

				<div class = "contentSlide">	
					<img src = "img/slides/img10.jpg">
					
				</div>

				<div class = "contentSlide">
					<img src = "img/slides/img20.jpg">
				</div>

				<div class = "contentSlide">
					<img src = "img/slides/img30.jpg">
				</div>

				<div class = "contentSlide">
					<img src = "img/slides/img4.jpg">
				</div>

				<div class = "contentSlide">			
					<img src = "img/slides/img10.jpg">
				</div>

			</figure>
		</div>

		<div id = "sliderMob">

			<figure>

				<div class = "contentSlideMob">	
					<img src = "img/slides/mobile/img1.jpg">
					
				</div>

				<div class = "contentSlideMob">
					<img src = "img/slides/mobile/img2.jpg">
				</div>

				<div class = "contentSlideMob">
					<img src = "img/slides/mobile/img3.jpg">
				</div>

				<div class = "contentSlideMob">
					<img src = "img/slides/mobile/img4.jpg">
				</div>

				<div class = "contentSlideMob">			
					<img src = "img/slides/mobile/img1.jpg">
				</div>

			</figure>
		</div>

		<div id = "funcionalidades" class = "clearfix">

			<div id ="TitleBack">
				
				<img src = "img/logo/engre.png">

				<div id="textoFuncTit">
					<p id = "tituloFuncionalidades">Funcionalidades</p>
					<p id = "subtituloFuncionalidades">Conheça mais sobre o Daily Clean</p>
				</div>
				
			</div>

			<div class = "funcBloco" id = "cadClientes">
				<h4>Cadastro de Clientes</h3>

				<p>Você poderá encontrar serviços, 
				e ter a visualização destes, com todas 
				suas informações e contatos de uma forma 
				muito mais organizada, além de poder cadastrar 
				eventos para cada tipo de serviço específico.</p>	
			</div>

			<div class = "funcBloco" id = "visEventos">
				<h4>Agenda</h3>	

				<p>Na agenda do Daily Clean você poderá
				se organizar de forma muito mais eficiente
				e com muita facilidade.</p>
			</div>
		</div>

		<div id = "infoInferior">
				<center><p>Daily Clean 2019</p></center>
		</div>
	</body>
</html>