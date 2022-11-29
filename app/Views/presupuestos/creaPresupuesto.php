<?=$cabecera?>
Formulario de crear

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de presupuesto</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardapresupuesto')?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="vigencia">Vigencia (Año):</label>
                    <input id="vigencia" value="<?=old('vigencia')?>" class="form-control" type="text" name="vigencia">
                </div>
                <div class="form-group">
                    <label for="mes">Mes:</label>
                    <input id="mes" value="<?=old('mes')?>" class="form-control" type="text" name="mes">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input id="descripcion" value="<?=old('descripcion')?>" class="form-control" type="text" name="descripcion">
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listapresupuestos');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

<?=$pie?>