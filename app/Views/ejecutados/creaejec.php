<?=$cabecera?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar nueva ejecución</h5>
        <p class="card-text">

            <form method="post" action="<?=base_url('/guardaejecutado')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="tipomovimiento">Tipo de movimiento:</label>
                        <select class='custom-select' name="tipomovimiento" id="tipomovimiento">
                            <option value="0">Seleccione tipo de cuenta</option>
                            <option value="E">Cuenta de Egreso</option>
                            <option value="I">Cuenta de Ingreso</option>
                        </select>
                    </div>
                    <div class="form-group col-sm" id="cbocuentas">
                    </div>
                    <div class="form-group col-sm" id="cborubros">
                    </div>
                </div>
                <div class="form-group col-sm" id="pagosprogramados">
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="cbofuentes">Fuente del pago:</label>
                        <select class='custom-select' name="cbofuentes" id="cbofuentes">
                            <option value="0">Seleccione fuente del pago:</option>
                            <?php foreach($fuentes as $fuente):?>
                                <option value="<?=$fuente['id']?>"><?php echo $fuente['nombre']." (".$fuente['tipofuente'].")";?></option>
                            <?php endforeach;?>    
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="fecha">Fecha límite pago:</label>
                        <input id="fecha" class="form-control" type="date" name="fecha" value="<?=date('Y-m-d');?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="detalle">Detalle del pago:</label>
                        <input id="detalle" value="<?=old('detalle')?>" class="form-control" type="text" name="detalle">
                    </div>
                    <div class="form-group col-sm">
                        <label for="valor">Valor del pago:</label>
                        <input id="valor" class="form-control" type="text" name="valor">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listaejecutados');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?=base_url('inc/js/ejecutados.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tipomovimiento').change(function(){
            urlbasec = "<?php echo base_url('index.php/ejecutados/importarcuentas'); ?>";
            urlbaser = "<?php echo base_url('index.php/ejecutados/importarrubros'); ?>";
            urlbasep = "<?php echo base_url('index.php/ejecutados/importarprogs'); ?>";
            tipomovimiento = $(this).val();
            cargacuentas(tipomovimiento,urlbasec,urlbaser,urlbasep);
        });
    });
</script>
</body>
</html>

