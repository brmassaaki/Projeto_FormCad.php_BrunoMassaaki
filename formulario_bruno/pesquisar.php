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
    <script type="text/javascript" src="js/lista.js" ></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>Pesquisar</title>
</head>
<body>
	<div class="container">	
		<form id="list" method="POST" action="pesquisar_result.php">
			<h1>Pesquisar</h1>

			<div class="row">
		       	<div class="col">
			    	<input type="text" name="nome" id="nome" class="form-control" placeholder="Pesquisar por NOME">
			    </div>
		        <div class="col">
		        	<button type="submit" id="btn_pesquisar" value="Pesquisar" class="btn btn-primary">Pesquisar</button>
		        </div>
		    </div>
		    <br>		    
		    <div class="row">
		       	<div class="col">
			    	<input type="text" name="cpf" id="cpf" class="form-control" placeholder="Pesquisar por CPF">
			    </div>
		        <div class="col">
		        	<button type="submit" id="btn_pesquisar" value="Pesquisar" class="btn btn-primary">Pesquisar</button>
		        </div>
		    </div>
		    <br>
		    <div class="row">
		       	<div class="col">		       		
			    	<input type="date" name="dtnascimento" id="dtnascimento" class="form-control" placeholder="Pesquisar por DATA DE NASCIMENTO">
			    </div>
		        <div class="col">
		        	<button type="submit" id="btn_pesquisar" value="Pesquisar" class="btn btn-primary">Pesquisar</button>
		        </div>
		    </div>
		    <br>
		    <br>
		    <div class="row">
		    	<button type="submit" id="btn_voltar" value="Voltar" class="btn btn-primary">VOLTAR</button>
		    </div>	
		</form>
	</div>
</body>
</html>