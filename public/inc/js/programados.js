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

function cargarubros(idcuenta,urlbase){
    
    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "idcuenta="+idcuenta,
        success: function(r){
            $('#cborubros').html(r);
        }
    });

}

function cargacuentas(tipomovimiento,urlbase,urlbaser){

    $.ajax({
        type: "POST",
        url: urlbase,
        dataType: "html",
        data: "tipomov="+tipomovimiento,
        success: function(r){
            $('#cbocuentas').html(r);
            $("#cuentas").change(function(){
                urlbase = "<?php echo base_url('index.php/programados/importarrubros'); ?>";
                idcuenta = $(this).val();
                cargarubros(idcuenta,urlbaser);
            });
        }
    });
    
}