$(document).ready(function () {
  // Buscador de proveedores

  $("#searchprov").on("input", function () {
    buscarProveedor();
  });

  function buscarProveedor() {
    var searchTerm = $("#searchprov").val();

    $.ajax({
      type: "post",
      url: "?b=profile&s=buscarProveedor",
      data: { buscar_proveedor: searchTerm },
    }).done(function (response) {
      $("#resultados-proveedor").html(response);
    });
  }

  // Buscador de empleados
  $("#searchcol").on("input", function () {
    buscarEmpleado();
  });

  function buscarEmpleado() {
    var searchTerm = $("#searchcol").val();

    $.ajax({
      type: "post",
      url: "?b=profile&s=buscarColaborador",
      data: { buscar_empleado: searchTerm },
    }).done(function (response) {
      $("#resultados-empleados").html(response);
    });
  }

  // Buscador de clientes
  $("#searchcli").on("input", function () {
    buscarClientes();
  });

  function buscarClientes() {
    var searchTerm = $("#searchcli").val();

    $.ajax({
      type: "post",
      url: "?b=profile&s=buscarClientes",
      data: { buscar_cliente: searchTerm },
    }).done(function (response) {
      $("#resultados-clientes").html(response);
    });
  }

  // Buscador de mascotas
  $("#searchmas").on("input", function () {
    buscarMascotas();
  });

  function buscarMascotas() {
    var searchTerm = $("#searchmas").val();
    
    $.ajax({
      type: "post",
      url: "?b=profile&s=buscarMascotas",
      data: { buscar_mascota: searchTerm },
    }).done(function (response) {
      $("#resultados-mascotas").html(response);
    });
  }

});

