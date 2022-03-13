$(document).ready(function(){
            
    $(document).on("click", "#btn_listar", function(){  
        $.ajax({                
            type: "POST",
            success: function(response) {
                window.location.replace("lista.php");
            }
        });
    }); 

    $(document).on("click", "#btn_salvar", function(){  

        var dados = $('#editarCliente').serialize();

        $.ajax({
            url: "/formulario_bruno/alterar.php",
            type: "POST",
            data: dados,
            dataType: "html"
        }).success(function(data){                 
            alert("O Cliente foi alterado com sucesso!");
            location.reload();

         }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);                   
        });

        return false;

    });          
});