<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creapresupuesto')?>">Crear un presupuesto</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Fecha Registro</th>
            <th>vigencia (Año)</th>
            <th>Mes</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($presupuestos as $presupuesto):?>
            
            <tr>
                <td><?=$presupuesto['creado'];?></td>
                <td><?=$presupuesto['vigencia'];?></td>
                <td><?=$presupuesto['mes'];?></td>
                <td><?=$presupuesto['descripcion'];?></td>
                <td>
                    <a href="<?=base_url('editapresupuesto/'.$presupuesto['id']);?>" class="btn btn-info" type="button">Editar</a>    
                    <a href="<?=base_url('borrapresupuesto/'.$presupuesto['id']);?>" class="btn btn-danger" type="button">Borrar</a>    
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?=$pie?>