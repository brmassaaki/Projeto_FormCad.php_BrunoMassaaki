$(document).ready(function(){
			
	$(document).on("click", "#btn_listar", function(){ 
		$.ajax({				
		    type: "POST",
		    success: function(response) {
	            window.location.replace("lista.php");
	        }
		});
	});	

	$(document).on("click", "#btn_pesquisar", function(){ 
		$.ajax({				
		    type: "POST",
		    success: function(response) {
	            window.location.replace("pesquisar.php");
	        }
		});
	});	

	$(document).on("click", "#btn_salvar", function(){ 

	    var dados = $('#cadCliente').serialize();

	    $.ajax({
		    url: "/formulario_bruno/salvar.php",
		    type: "POST",
		    data: dados,
		    dataType: "html"

		}).success(function(data){								
			if (data != ""){
				document.getElementById('cpf').focus();
				alert("Error : O CPF já se encontra cadastrado!");
			}else{						
				alert("O Cliente foi cadastrado com sucesso!");
		    	location.reload();
		    }
		 }).fail(function(jqXHR, textStatus ) {		 	
		    console.log("Request failed: " + textStatus);				    
		});

		return false;
	});				
});