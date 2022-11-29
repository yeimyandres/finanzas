<?=$cabecera?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar datos de cuenta</h5>
            <p class="card-text">

                <form method="post" action="<?=site_url('/actualizacuenta')?>" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$cuenta['id'];?>">

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" value="<?=$cuenta['nombre'];?>">
                    </div>

                    <div class="form-group">
                        <label for="moviimiento">Tipo Movimiento:</label>
                        <select name="movimiento" id="movimiento">
                            <option value="E">Cuenta de Egreso</option>
                            <option value="I">Cuenta de Ingreso</option>
                        </select>
                    </div>

                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a href="<?=base_url('listacuentas');?>" class="btn btn-info">Cancelar</a>

                </form>

            </p>
        </div>
    </div>
<?=$pie?>