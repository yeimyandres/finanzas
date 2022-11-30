<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creaprogramado')?>">Programar nuevo pago</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Fecha</th>
            <th>Cuenta</th>
            <th>Tipo Cuenta</th>
            <th>Rubro</th>
            <th>Detalle</th>
            <th>Valor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($programados->getResult() as $programado):?>

            <tr>
                <td><?=$programado['fecha'];?></td>
                <td><?=$programado['nomcuenta'];?></td>
                <td>
                    <?php
                        if ($programado['tipomovimiento']=='I') {
                            echo 'Ingreso';
                        }else{
                            echo 'Egreso';
                        }
                    ?>
                </td>
                <td><?=$programado['nombre'];?></td>
                <td><?=$programado['detalle'];?></td>
                <td><?=$programado['valor'];?></td>
                <td>
                    <a href="<?=base_url('editaprogramado/'.$programado['id']);?>" class="btn btn-info" type="button">Editar</a>    
                    <a href="<?=base_url('borraprogramado/'.$programado['id']);?>" class="btn btn-danger" type="button">Borrar</a>    
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?=$pie?>