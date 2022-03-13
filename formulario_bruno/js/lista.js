$(document).ready(function(){
            
    $(document).on("click", "#btn_voltar", function(){
        $.ajax({                
            type: "POST",
            success: function(response) {
                window.location.replace("/formulario_bruno/index.php");
            }
        });
    });                 

    $(document).on("click", "#btn_del", function(){                       

        if(confirm('Tem certeza de que deseja excluir a requisição?')){
            var id = $(this).parent().parent().attr('id');

            $.ajax({ 
                url: '/formulario_bruno/action.php', 
                type: 'GET', 
                data: { action: 'delete', ID: id },
                success: function(data) { 
                    alert("Exclusão realizada com sucesso!");
                    location.reload();
                } 
            });                                   
        }
        return false;
    }); 

    $(document).on("click", "#btn_alt", function(){ 

        var id = $(this).parent().parent().attr('id'); 

        $.ajax({
            url: "/formulario_bruno/action.php",
            type: "GET",
            data: { action: 'alterar', ID: id },
            success: function(data){                    
                $('body').html(data);
                location.reload();
            }                    
         });

        return false;
    });      
});