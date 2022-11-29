<?=$cabecera?>
Formulario de editar

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de rubro</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/actualizarubro')?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?=$rubro['id'];?>">

                <div class="form-group">
                    <label for="cuenta">Cuenta:</label>
                    <select name="cuenta" id="cuenta">
                    <?php foreach($cuentas as $cuenta):?>
                        <option value="<?=$cuenta['id'];?>">
                            <?=$cuenta['nombre'];?>
                        </option>
                    <?php endforeach; ?>                            
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre Rubro:</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" value="<?=$rubro['nombre'];?>">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción Rubro:</label>
                    <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?=$rubro['descripcion'];?>">
                </div>

                <button class="btn btn-success" type="submit">Actualizar</button>
                <a href="<?=base_url('listarubros');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>

<?=$pie?>