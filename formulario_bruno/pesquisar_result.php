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
    <script type="text/javascript" src="js/lista_pesquisar.js" ></script>

    <title>Resultado da Pesquisa</title>
</head>
<body></body>
</html>
<?php
    include("funcoes.php");
    
    if ($_POST['cpf'] != "") {
        $pesquisar = $_POST['cpf'];
        $pesq_result = pesquisar_cpf($pesquisar);
    }else if ($_POST['nome'] != "") {
        $pesquisar = $_POST['nome'];
        $pesq_result = pesquisar_nome($pesquisar);
    }else if ($_POST['dtnascimento'] != "") {
        $pesquisar = $_POST['dtnascimento'];        
        $pesq_result = pesquisar_dtnascimento($pesquisar);
    }
    
    $numrows = pg_num_rows($pesq_result);
    $fnum    = pg_num_fields($pesq_result);      

    echo "<table border align = 'center' width='70%' style = 'text-align : center; border: 3px solid black;'>";
    echo "<form id='list' method='GET'>";  
    echo "<h1 style = 'text-align : center;'>RESULTADO PESQUISA</h1>";
    echo "<tr>";

    for ($x = 0; $x < $fnum; $x++) {
        echo "<td><b>";
        if (pg_field_name($pesq_result, $x) == "dtnascimento") echo "DATA DE NASCIMENTO";
        else echo strtoupper(pg_field_name($pesq_result, $x));        
        echo "</b></td>";
    }

    echo "</tr>";

    for ($i = 0; $i < $numrows; $i++) {
        
        $row = pg_fetch_object($pesq_result, $i);

        $cod    = pg_field_name($pesq_result, 0);
        $cod_id = $row->$cod;      
        echo "<tr align='center' id=$cod_id>";  
        for ($x = 0; $x < $fnum; $x++) {
            $fieldname = pg_field_name($pesq_result, $x);            
            echo "<td>";        
            if (pg_field_name($pesq_result, $x) == "dtnascimento") echo DateTime::createFromFormat('Y-m-d', $row->$fieldname)->format("d/m/Y");            
            else echo $row->$fieldname;            
            echo "</td>";            
        }                   

        echo"</tr>";        
    }   
    echo "</table>";  
    echo "<div style = 'text-align: center; padding-top: 5%;'><button style = 'width: 10%; height: 5%;' type='submit' id='btn_voltar' class='btn btn-primary'>VOLTAR</button></div>"; 

    echo "</form>";       
?>