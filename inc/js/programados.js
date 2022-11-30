function cargarubros(idcuenta){
    
    $.ajax({
        type: "POST",
        url: "http://localhost/finanzas/inc/php/importarrubros.php",
        data: "idcuenta=" + idcuenta,
        success: function(r){
            $("#cborubros").html(r);
        },
        error: function(jqXHR,status,error){
            alert(status);
            alert (error);
        }

    });

}
function cargacuentas(tipomovimiento){
    //alert ("ingreso con tipomov = "+tipomovimiento);
    $.ajax({
        type: "POST",
        url: "http://localhost/finanzas/inc/php/importarcuentas.php",
        data: "tipomovimiento=" + tipomovimiento,
        success: function(r){
            $("#cbocuentas").html(r);
            $('#cuentas').change(function(){
                cargarubros($(this).val());
            });    
        },
        error: function(jqXHR,status,error){
            alert(status);
            alert (error);
        }

    });

}