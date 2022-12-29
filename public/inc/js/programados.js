function cargarlistadoprog(urlbase,idcuenta,idrubro){
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "idcuenta="+idcuenta+"&idrubro="+idrubro,
        success: function(r){
            $("#tblProgramados tbody").html(r);
        }
    });
}