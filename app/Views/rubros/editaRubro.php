<?=$cabecera?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar datos de rubro</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/actualizarubro')?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?=$rubro['id'];?>">

                <div class="form-group">
                    <select class='custom-select' name="tipomovimiento" id="tipomovimiento">
                        <option value="0">Seleccione un tipo de cuenta...</option>
                        <option value="I">Cuenta de ingreso</option>
                        <option value="E">Cuenta de egreso</option>
                    </select>
                </div>

                <input type="hidden" name="idcuenta" id="idcuenta" value="<?=$rubro['idcuenta'];?>">

                <div class="form-group" id='cbocuentas'>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre Rubro:</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" value="<?=$rubro['nombre'];?>">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción Rubro:</label>
                    <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?=$rubro['descripcion'];?>">
                </div>

                <button class="btn btn-success" type="submit">Actualizar</button>
                <a href="<?=base_url('listarubros');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?=base_url('inc/js/rubros.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tipomovimiento').change(function(){
            urlbase = "<?php echo base_url('index.php/rubros/importarcuentase'); ?>";
            idcuenta = $("#idcuenta").val();
            alert(idcuenta);
            tipomovimiento = $(this).val();
            cargacuentase(tipomovimiento,urlbase,idcuenta);
        });
    });
</script>
</body>
</html>