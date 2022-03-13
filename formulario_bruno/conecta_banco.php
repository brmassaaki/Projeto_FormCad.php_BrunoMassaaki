<?php

	define("BANCO_DADOS", "POSTGRESQL");
	define("HOST", "127.0.0.1");
	define("USER", "brunomassaaki");
	define("DBNAME", "bruno");
	define("PASS", "");
	define("PORT", "5432");

	$fd = null;

	try
	{
		$fd = pg_connect("host=".HOST." port=".PORT." dbname=".DBNAME." user=".USER." password=".PASS) or die("Não foi possível conectar ao servidor PostGreSQL");		

		if ($fd === false)
    		throw new Exception('Erro ao conectar no banco de dados');

	}
	catch(Exception $e) 
	{
		$err  = "<HTML>";
		$err .= "<LINK rel=\"stylesheet\" type=\"text/css\" href=\"ext/resources/css/bruno.css\" />";
		$err .= "<BODY class=\"mainbody\">";
		$err .= "<CENTER><FONT size=5 color=red>Erro ao conectar o Banco de Dados ".HOST."/".DBNAME.".</FONT><BR>Contate o administrador.<BR></CENTER>";
		$err .= "</BODY>";
		$err .= "</HTML>";
		echo $err;
		echo ifractal_json_encode(array("success"=>false, "error_html"=>$err));
		exit(3);
	}

	define("CONECT_DB", $fd);

?>
