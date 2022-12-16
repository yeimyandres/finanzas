<?=$cabecera?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de movimiento</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardamovimiento')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="transaccion">Transacción a realizar:</label>
                        <select class='custom-select' name="transaccion" id="transaccion">
                            <option value="0">Seleccione transacción...</option>
                            <option value="R">Retiro</option>
                            <option value="C">Consignación</option>
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="fecha">Fecha:</label>
                        <input class="form-control" type="date" name="fecha">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="detalle">Descripción:</label>
                        <input class="form-control" type="text" name="detalle">
                    </div>
                    <div class="form-group col-sm">
                        <label for="valor">Valor:</label>
                        <input class="form-control" type="text" name="valor">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('guardamovimiento');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

<?=$pie?>