<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creacuenta')?>">Crear una cuenta</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Tipo Movimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cuentas as $cuenta):?>
            
            <tr>
                <td><?=$cuenta['nombre'];?></td>
                <td>
                    <?php
                        if ($cuenta['tipomovimiento']=='I') {
                            echo 'Cuenta de Ingreso';
                        }else{
                            echo 'Cuenta de Egreso';
                        }
                    ?>
                </td>
                <td>
                    <a href="<?=base_url('editacuenta/'.$cuenta['id']);?>" class="btn btn-info" type="button">Editar</a>    
                    <a href="<?=base_url('borracuenta/'.$cuenta['id']);?>" class="btn btn-danger" type="button">Borrar</a>    
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?=$pie?>