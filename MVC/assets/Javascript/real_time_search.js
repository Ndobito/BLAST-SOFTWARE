// Buscadores para proveedor
$(document).ready(function() {
    
    $("#searchprov").on("input", function() {
      buscarProveedor();
    });
  
    function buscarProveedor() {
      var searchTerm = $("#searchprov").val(); 
      
      $.ajax({
        type: "post",
        url: "?b=profile&s=buscarProveedor",
        data: { buscar_proveedor: searchTerm },
        success: function(response) {
          
          $("#resultados").html(response);
        },
      });
    }
  });