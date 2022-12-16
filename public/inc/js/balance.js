function cargarestadorubros(urlbase,estado){
    //alert("Estado es: "+estado+", ruta: "+urlbase);
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "estado="+estado,
        success: function(r){
            $("#tblEstadoRubros tbody").html(r);
            $("#tblEstadoRubros tbody").show("fast");
        }
    });
}