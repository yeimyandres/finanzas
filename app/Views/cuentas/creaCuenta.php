<?=$cabecera?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de cuenta</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardacuenta')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="movimiento">Movimiento:</label>
                        <select class='custom-select' name="movimiento" id="movimiento">
                            <option value="E">Cuenta de Egreso</option>
                            <option value="I">Cuenta de Ingreso</option>
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listacuentas');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

<?=$pie?>