<?=$cabecera?>
Formulario de crear

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de rubro</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardarubro')?>" enctype="multipart/form-data">

                <div class="form-group">
                    <select class='custom-select' name="tipomovimiento" id="tipomovimiento">
                        <option value="0">Seleccione un tipo de cuenta...</option>
                        <option value="I">Cuenta de ingreso</option>
                        <option value="E">Cuenta de egreso</option>
                    </select>
                </div>

                <div class="form-group" id='cbocuentas'>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre Rubro:</label>
                    <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción Rubro:</label>
                    <input id="descripcion" value="<?=old('descripcion')?>" class="form-control" type="text" name="descripcion">
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
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
            urlbase = "<?php echo base_url('index.php/rubros/importarcuentas'); ?>";
            tipomovimiento = $(this).val();
            cargacuentas(tipomovimiento,urlbase);
        });
    });
</script>
</body>
</html>