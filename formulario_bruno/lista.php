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
    <script type="text/javascript" src="js/formulario.js" ></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/lista.js" ></script>

    <title>Clientes Cadastrados</title>
</head>
<body></body>
</html>

<?php

    include("funcoes.php");

	$result = select();

	$numrows = pg_num_rows($result);
    $fnum    = pg_num_fields($result);      

    echo "<table border align = 'center' width='70%' style = 'text-align : center; border: 3px solid black;>";
    echo "<form id='listCliente' method='GET'>";
    echo "<h1 style = 'text-align : center;'>CLIENTES CADASTRADOS</h1>";    
    echo "<tr>";

    for ($x = 0; $x < $fnum; $x++) {
        echo "<td><b>";
        if (pg_field_name($result, $x) == "dtnascimento") echo "DATA DE NASCIMENTO";
        else echo strtoupper(pg_field_name($result, $x));        
        echo "</b></td>";
    }

    echo "</tr>";

    for ($i = 0; $i < $numrows; $i++) {
        $row = pg_fetch_object($result, $i);

        $cod    = pg_field_name($result, 0);
        $cod_id = $row->$cod;      
        echo "<tr align='center' id=$cod_id>";  
        for ($x = 0; $x < $fnum; $x++) {
            $fieldname = pg_field_name($result, $x);

            if (pg_field_name($result, $x) == "dtnascimento") {
                $m = explode("-", $row->$fieldname);
                $m = $m[1];
                if ($m[1] == date("m")) $aniversariante .= $row->$fieldname . " " ;                
            }
            echo "<td>";
            if (pg_field_name($result, $x) == "dtnascimento") echo DateTime::createFromFormat('Y-m-d', $row->$fieldname)->format("d/m/Y");            
            else echo $row->$fieldname;            
            echo "</td>";            
        }                   

        echo "<td>";
        
        echo "<button type='submit' id='btn_alt' class='btn btn-warning'>ALTERAR</button>&nbsp;&nbsp;&nbsp;<button type='submit' id='btn_del' class='btn btn-danger'>DELETAR</button>";

        echo "</td>";

        echo"</tr>";        
    }   
    echo "<tr>";
    echo "<td colspan = '5' style='font-weight: bold;' align='left'>";
    echo "Quantidade total de clientes cadastrados: $numrows";
    echo "</td>";
    echo"</tr>";   

    $aniv_result  = aniversariantes();        

    $numrows_aniv = pg_num_rows($aniv_result);
    $fnum_aniv    = pg_num_fields($aniv_result);      

    echo "<tr>";
    echo "<td colspan = '5'>";
    echo "<div style='font-weight: bold;'>Aniversariantes do mês: </div>";      

    for ($y = 0; $y < $numrows_aniv; $y++) {
        $row_aniv = pg_fetch_object($aniv_result, $y);

        echo "<div>";      
       
        for ($e = 0; $e < $fnum_aniv; $e++) {
            $fieldname_aniv = pg_field_name($aniv_result, $e); 
            if (pg_field_name($aniv_result, $e) == "id") continue;                               
            if (pg_field_name($aniv_result, $e) == "dtnascimento") echo "   " . "<strong>DATA DE NASCIMENTO</strong>" . " : " . DateTime::createFromFormat('Y-m-d', $row_aniv->$fieldname_aniv)->format("d/m/Y");            
            else echo "   " . "<strong>" . strtoupper($fieldname_aniv) . "</strong>" . " : " . $row_aniv->$fieldname_aniv;                                    
        }    

        echo "</div>";                            
    } 
    echo "</td>";
    echo"</tr>";
    

    echo "</table>";
    echo "<div style = 'text-align: center; padding-top: 5%;'><button style = 'width: 10%; height: 5%;' type='submit' id='btn_voltar' class='btn btn-primary'>VOLTAR</button></div>"; 

    echo "</form>";
?>
