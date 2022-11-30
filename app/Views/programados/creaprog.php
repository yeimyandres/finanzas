<?=$cabecera?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de pago a programar</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardaprogramado')?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tipomovimiento">Tipo de movimiento:</label>
                    <select name="tipomovimiento" id="tipomovimiento">
                        <option value="E">Egreso</option>
                        <option value="I">Ingreso</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cuenta">Cuenta:</label>
                    <select name="cuenta" id="cuenta"></select>
                </div>
                <div class="form-group">
                    <label for="rubro">Rubro:</label>
                    <select name="rubro" id="rubro"></select>
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

<?=$pie?>