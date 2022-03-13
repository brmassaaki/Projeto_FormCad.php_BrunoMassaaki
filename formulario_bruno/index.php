<!DOCTYPE html>
<html lang="pt">
<head>
	<meta name="charset" charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/additional-methods.min.js"></script>
	<script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>	

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/index.js" ></script>

	<title>Cadastro de Clientes</title>	
</head>

<body style="text-align: center;">	
	<div class="container">	

		<form id="cadCliente" name="cadCliente" action="" method="POST">

			<h1>Cadastro de Clientes</h1>

			<div class="row">
		        <label>Nome:</label>
		        <input type="text" name="nome" id="nome" class="form-control" autocomplete="off"> 
		    </div>
		    
		    <div class="row">
		        <label>CPF:</label>
		        <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" autocomplete="off">
		    </div>		    

		    <div class="row">
		        <label>Data de Nascimento:</label>
		        <input type="date" name="dtnascimento" id="dtnascimento" class="form-control" required>
		    </div>			    
		    <br>
			<div>
				<button type="submit" id="btn_salvar" value="Cadastrar" class="btn btn-primary">NOVO CADASTRO</button>
				<button type="submit" id="btn_listar" value="Listar" class="btn btn-primary">LISTAR CLIENTES</button>
				<button type="submit" id="btn_pesquisar" value="Listar" class="btn btn-info">PESQUISAR</button>				
			</div>	
			<br>

		</form>
	</div>	
</body>
</html>