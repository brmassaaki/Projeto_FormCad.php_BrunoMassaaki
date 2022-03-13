<?php
	include("conecta_banco.php");

	function select(){ 
		$sql  = "SELECT id, nome, cpf, dtnascimento FROM clientes ORDER BY id;";
		return pg_query(CONECT_DB,$sql);
	}

	function insert($nome, $cpf, $dtnascimento){
		$sql 	= "INSERT INTO clientes(nome, cpf, dtnascimento) VALUES ('$nome', '$cpf', '$dtnascimento');";
		return pg_query(CONECT_DB, $sql);	
	}

	function delete($id){
		$sql       = "DELETE FROM clientes where id = $id;";
        return pg_query(CONECT_DB,$sql);
	}

	function select_id($id){
		$sql       = "SELECT * FROM clientes where id = $id;";
        return pg_query(CONECT_DB,$sql);
	}

	function select_cpf($cpf){
		$sql       = "SELECT * FROM clientes where cpf = '$cpf';";
        return pg_query(CONECT_DB,$sql);
	}

	function update($id, $nome, $cpf, $dtnascimento){
		$sql      = "UPDATE clientes SET nome = '$nome', cpf = '$cpf', dtnascimento = '$dtnascimento' WHERE id = $id;";
        return pg_query(CONECT_DB,$sql);
	}	

	function pesquisar_cpf($cpf){
		$sql      = "SELECT * FROM clientes WHERE cpf LIKE '%$cpf%' LIMIT 5;";
        return pg_query(CONECT_DB,$sql);
	}

	function pesquisar_nome($nome){
		$sql      = "SELECT * FROM clientes WHERE nome LIKE '%$nome%' LIMIT 5;";
        return pg_query(CONECT_DB,$sql);
	}

	function pesquisar_dtnascimento($dtnascimento){	
		$sql      = "SELECT * FROM clientes WHERE dtnascimento = '$dtnascimento' LIMIT 5;";
        return pg_query(CONECT_DB,$sql);
	}

	function aniversariantes(){	
		$sql      = "SELECT * FROM clientes WHERE Extract(Month FROM dtnascimento) = Extract(Month FROM Now())";
        return pg_query(CONECT_DB,$sql);
	}
?>