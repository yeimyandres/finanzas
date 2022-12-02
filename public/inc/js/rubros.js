function cargacuentas(tipomovimiento,urlbase){

    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "tipomov="+tipomovimiento,
        success: function(r){
            $('#cbocuentas').html(r);
        }
    });
    
}
function cargacuentase(tipomovimiento,urlbase,idcuenta){

    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "tipomov="+tipomovimiento+"&idcuenta="+idcuenta,
        success: function(r){
            $('#cbocuentas').html(r);
        }
    });
    
}