<?php
        include("funcoes.php");                

        $id             = $_POST["id"];        
        $nome           = $_POST["nome"];
        $cpf           	= $_POST["cpf"];
        $dtnascimento   = $_POST["dtnascimento"];        

        update($id, $nome, $cpf, $dtnascimento);
?>