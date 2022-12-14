function cargarlistadoejec(urlbase,idcuenta,idrubro){
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "idcuenta="+idcuenta+"&idrubro="+idrubro,
        success: function(r){
            //$('#cborubros').html(r);
            $("#tblEjecutados tbody").html(r);
        }
    });
}
function cargaprogs(idrubro,urlbase){
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "idrubro="+idrubro,
        success: function(r){
            $('#pagosprogramados').html(r);
        }
    });
}

function cargarubros(idcuenta,urlbase,urlbasep){
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "idcuenta="+idcuenta,
        success: function(r){
            $('#cborubros').html(r);
            $("#rubros").change(function(){
                idrubro = $(this).val();
                cargaprogs(idrubro,urlbasep);
            });
        }
    });
}

function cargacuentas(tipomovimiento,urlbase,urlbaser,urlbasep){
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "tipomov="+tipomovimiento,
        success: function(r){
            $('#cbocuentas').html(r);
            $("#cuentas").change(function(){
                $('#pagosprogramados').html("");
                idcuenta = $(this).val();
                cargarubros(idcuenta,urlbaser,urlbasep);
            });
        }
    });
}