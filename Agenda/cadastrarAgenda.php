<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Agenda</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap DateTimePicker-->
	<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">

   
  </head>
  <body>
	<div class='container'>
	<h1>Agenda</h1>
		<form method="POST" action="validaCadAgenda.php">
		  <div class="form-group">
			<label for="nome-agenda" class="control-label">Titulo:</label>
			<input name="Nome_agenda" type="text" class="form-control" id="nome-agenda" required>
		  </div>
		  <div class="form-group">
			<label for="inicio_agenda">Data inicio</label>
				<div class="input-group date data_formato"   data-date-format="dd/mm/yyyy HH:ii:ss" required>
					<input name="Inicio_agenda" class="form-control" type="text">
					<span  class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>   
		  </div>
		   <div class="form-group">
			<label for="final_agenda">Data final</label>
				<div class="input-group date data_formato"   data-date-format="dd/mm/yyyy HH:ii:ss" required>
					<input name="Final_agenda" class="form-control" type="text">
					<span  class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>   
		  </div>
		  <div class="form-group">
            <label for="descricao-agenda" class="control-label">Descrição:</label>
            <textarea name="Descricao_agenda" class="form-control" id="descricao-agenda"></textarea>
          </div>
		  <button type="submit" class="btn btn-default">Cadastrar</button>
		  <a href='agenda.php'><button type="button" class="btn btn-info">Lista</button></a>
		</form>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- JS -->
    <script src="../js/bootstrap.min.js"></script>
	<!-- JS DateTimePicker-->
	<script src="../js/bootstrap-datetimepicker.min.js"></script>
	<!-- Traducao DateTimePicker-->
	<script src="../js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
	<script type="text/javascript">
		$('.data_formato').datetimepicker({
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
			showMeridian: 1,
			language: "pt-BR"
		});
	</script>
	</body>
</html>