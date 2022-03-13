<?php	

	include("funcoes.php");
	
	$nome	 		= $_POST["nome"];
	$cpf 			= $_POST["cpf"];
	$dtnascimento	= $_POST["dtnascimento"];

	$result = select_cpf($cpf);
	
	if (pg_num_rows($result) > 0) {				
		echo "Error : O CPF: $cpf, já se encontra cadastrado!";
	}else{
		$result = insert($nome, $cpf, $dtnascimento);	
	}
	
?>