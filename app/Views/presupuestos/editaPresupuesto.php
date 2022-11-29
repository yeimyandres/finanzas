<?=$cabecera?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar datos de presupuesto</h5>
            <p class="card-text">

                <form method="post" action="<?=site_url('/actualizapresupuesto')?>" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$presupuesto['id'];?>">

                    <div class="form-group">
                        <label for="vigencia">Vigencia:</label>
                        <input id="vigencia" class="form-control" type="text" name="vigencia" value="<?=$presupuesto['vigencia'];?>">
                    </div>
                    <div class="form-group">
                        <label for="mes">Mes:</label>
                        <input id="mes" class="form-control" type="text" name="mes" value="<?=$presupuesto['mes'];?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?=$presupuesto['descripcion'];?>">
                    </div>

                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a href="<?=base_url('listapresupuestos');?>" class="btn btn-info">Cancelar</a>

                </form>

            </p>
        </div>
    </div>
<?=$pie?>