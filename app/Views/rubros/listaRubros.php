<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('crearubro')?>">Crear nuevo rubro</a>
<br/>
<br/>

<table class="table table-light">
    <thead class="thead-light">
        <tr align='center'>
            <th>Cuenta</th>
            <th>Tipo Movimiento</th>
            <th>Rubro</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rubros->getResult() as $rubro):?>
            
            <tr>
                <td><?php echo $rubro->nomcuenta;?></td>
                <td>
                    <?php
                        if ($rubro->tipomovimiento=='I') {
                            echo 'Cuenta de Ingreso';
                        }else{
                            echo 'Cuenta de Egreso';
                        }
                    ?>
                </td>
                <td><?php echo $rubro->nombre;?></td>
                <td><?php echo $rubro->descripcion;?></td>
                <td>
                    <a href="<?=base_url('editarubro/'.$rubro->id);?>" class="btn btn-info btn-sm" type="button">Editar</a>    
                    <a href="<?=base_url('borrarubro/'.$rubro->id);?>" class="btn btn-danger btn-sm" type="button">Borrar</a>    
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?=$pie?>