$(document).ready(function() {
    $("#searchCol").click(function() {
        var numIdColaborador = $("#numIdColaborador").val();

        $.ajax({
            type: "POST",
            url: "?b=profile&s=searchUser&p=col",
            data: { numIdColaborador: numIdColaborador },
            dataType: "json",
            success: function(response) {
                var resultadosDiv = $("#name-col");
                resultadosDiv.val(response.nombre); // Utiliza .val() en lugar de .html()
            }
        });
    });
});

