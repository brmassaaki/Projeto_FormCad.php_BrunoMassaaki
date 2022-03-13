$(document).ready(function(){
            
    $(document).on("click", "#btn_voltar", function(){
        $.ajax({                
            type: "POST",
            success: function(response) {
                window.location.replace("/formulario_bruno/pesquisar.php");
            }
        });
    });                       
});