<!DOCTYPE html>
<html lang="pt">
<head>    
    <meta name="charset" charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Formulário</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script> 
    <script type="text/javascript" src="js/action.js" ></script>

    <title>Editar Cliente</title>
</head>
<body></body>
</html>

<?php
        include("funcoes.php");

        $id = $_GET["ID"];        

        if ($_GET['action'] == 'delete') {       
            delete($id);
        }else{  

            $result    = select_id($id);                        

            while($consulta = pg_fetch_assoc($result)) {

                    $id             = $consulta['id'];                   
                    $nome           = $consulta['nome'];
                    $cpf            = $consulta['cpf'];
                    $dtnascimento   = $consulta['dtnascimento'];                     

                    echo "<h1 align='center'>EDITAR CLIENTE</h1>";
                    echo "<div align='center'>";
                    echo "<form method='POST' action='' id='editarCliente'>";

                    echo "<input id='id' type='text' name='id' value='$id' hidden='true'>";                    

                    echo "<div><label>Nome : </label> <input id='nome' type='text' name='nome' maxlength='50' value='$nome' autofocus='autofocus'></div>";

                    echo "<div><label>CPF : </label> <input id='cpf' type='text' name='cpf' maxlength='30' value='$cpf'></div>";

                    echo "<div><label>Data de Nascimento : </label> <input id='dtnascimento' type='date' name='dtnascimento' value='$dtnascimento'></div>";

                    echo "<div><button type='submit' id='btn_salvar' class='btn btn-primary'>SALVAR</button> <button type='submit' id='btn_listar' class='btn btn-primary'>VOLTAR</button></div>";   
                    echo "<div></div>";

                    echo "</form>";
                    echo "</div>";
            }
        }                     
?>