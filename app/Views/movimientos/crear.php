<?=$cabecera?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de movimiento</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardamovimiento')?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="transaccion">Transacción a realizar:</label>
                    <select name="transaccion" id="transaccion">
                        <option value="0">Seleccione transacción...</option>
                        <option value="R">Retiro</option>
                        <option value="C">Consignación</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input class="form-control" type="date" name="fecha">
                </div>
                <div class="form-group">
                    <label for="detalle">Descripción:</label>
                    <input class="form-control" type="text" name="detalle">
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input class="form-control" type="text" name="valor">
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('guardamovimiento');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

<?=$pie?>