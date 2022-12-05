<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creaejecutado')?>">Ejecutar un pago</a>
<br/>
<br/>
<table class="table table-sm table-light">
    <thead class="thead-light">
        <tr align='center'>
            <th>Fecha Pago</th>
            <th>Fuente</th>
            <th>Rubro</th>
            <th>Detalle</th>
            <th>Valor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $ingresosb = 0;
            $ingresose = 0;
            $egresosb = 0;
            $egresose = 0;
        ?>
        <?php foreach($ejecutados->getResult() as $ejecutado):?>

            <tr>
                <?php
                    $fecha = date_create($ejecutado->fecha);
                ?>
                <td align='center'><?=date_format($fecha,"j-M-Y");?></td>
                <td align='center'><?=$ejecutado->nombref;?></td>
                <td><?=$ejecutado->nombrer;?></td>
                <td><?=$ejecutado->detalle;?></td>
                <td align='right'><?=number_format($ejecutado->valor, 2);?></td>
                <?php
                    if ($ejecutado->tipomovimiento == 'I'){
                        if ($ejecutado->tipofuente=='B'){
                            $ingresosb += $ejecutado->valor;
                        }else{
                            $ingresose += $ejecutado->valor;
                        }
                    }else{
                        if ($ejecutado->tipofuente=='B'){
                            $egresosb += $ejecutado->valor;
                        }else{
                            $egresose += $ejecutado->valor;
                        }
                    }
                ?>
                <td>
                    <a href="<?=base_url('editaejecutado/'.$ejecutado->id);?>" class="btn btn-info btn-sm" type="button">Editar</a>    
                    <a href="<?=base_url('borraejecutado/'.$ejecutado->id);?>" class="btn btn-danger btn-sm" type="button">Borrar</a>    
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
</br>
<p><b>VALORES GENERALES:</b></p>
<?php
    $ingresototal = $ingresosb + $ingresose;
    $egresototal = $egresosb + $egresose;
?>
<p><b>Ingreso Total:</b> <?="$ ".number_format($ingresototal, 2);?>: <b>Ingreso en Bancos:</b> <?="$ ".number_format($ingresosb, 2);?> -- <b>Ingreso en Efectivo:</b> <?="$ ".number_format($ingresose, 2);?></p>
<p><b>Egreso Total:</b> <?="$ ".number_format($egresototal, 2);?>: <b>Egreso de Bancos:</b> <?="$ ".number_format($egresosb, 2);?> -- <b>Egreso de Efectivo:</b> <?="$ ".number_format($egresose, 2);?></p>
<?=$pie?>