<?=$cabecera?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de pago a programar</h5>
        <p class="card-text">

            <form method="post" action="<?=base_url('/guardaprogramado')?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tipomovimiento">Tipo de movimiento:</label>
                    <select name="tipomovimiento" id="tipomovimiento">
                        <option value="0">Seleccione tipo de cuenta</option>
                        <option value="E">Cuenta de Egreso</option>
                        <option value="I">Cuenta de Ingreso</option>
                    </select>
                </div>
                <div class="form-group" id="cbocuentas">
                </div>
                <div class="form-group" id="cborubros">
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle del pago:</label>
                    <input id="detalle" value="<?=old('detalle')?>" class="form-control" type="text" name="detalle">
                </div>
                <div class="form-group">
                    <label for="valor">Valor del pago:</label>
                    <input id="valor" class="form-control" type="text" name="valor">
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listaprogramados');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?=base_url('inc/js/programados.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tipomovimiento').change(function(){
            urlbasec = "<?php echo base_url('index.php/programados/importarcuentas'); ?>";
            urlbaser = "<?php echo base_url('index.php/programados/importarrubros'); ?>";
            tipomovimiento = $(this).val();
            cargacuentas(tipomovimiento,urlbasec,urlbaser);
        });
    });
</script>
</body>
</html>

