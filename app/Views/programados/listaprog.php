<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creaprogramado')?>">Programar Nuevo Ingreso/Egreso</a>
<label for='cbocuentas'>Cuentas: </label>
<select id="cbocuentas" name="cbocuentas">
    <option value='0'>Seleccione una cuenta...</option>
<?php
foreach($fltcuentas->getResult() as $fltcuenta):
    echo "<option value='".$fltcuenta->id."'>".$fltcuenta->nombre."</option>";
endforeach;
?>
</select>
<label for='cborubros'>Rubros: </label>
<select id="cborubros" name="cborubros">
</select>

<br/>
<br/>
<table class="table table-sm table-light" id='tblProgramados'>
    <thead class="thead-light">
        <tr align='center'>
            <th>Fecha Pago</th>
            <th>Cuenta</th>
            <th>Tipo Cuenta</th>
            <th>Rubro</th>
            <th>Detalle</th>
            <th>Valor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $ingresos = 0;
            $egresos = 0;
        ?>
        <?php foreach($programados->getResult() as $programado):?>

            <tr>
                <?php
                    $fecha = date_create($programado->fechalimite);
                ?>
                <td align='center'><?=date_format($fecha,"j-M-Y");?></td>
                <td align='center'><?=$programado->nomcuenta;?></td>
                <td align='center'>
                    <?php
                        if ($programado->tipomovimiento=='I') {
                            echo 'Ingreso';
                        }else{
                            echo 'Egreso';
                        }
                    ?>
                </td>
                <td><?=$programado->nombre;?></td>
                <td><?=$programado->detalle;?></td>
                <td align='right'><?=number_format($programado->valor, 2);?></td>
                <?php
                    if ($programado->tipomovimiento == 'I'){
                        $ingresos += $programado->valor;
                    }else{
                        $egresos += $programado->valor;
                    }
                ?>
                <td>
                    <a href="<?=base_url('editaprogramado/'.$programado->id);?>" class="btn btn-info btn-sm" type="button">Editar</a>    
                    <a href="<?=base_url('borraprogramado/'.$programado->id);?>" class="btn btn-danger btn-sm" type="button">Borrar</a>    
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
</br>
<p><b>VALORES GENERALES:</b></p>
<p><b>Ingresos Totales:</b> <?="$ ".number_format($ingresos, 2);?> -- <b>Egresos Totales:</b> <?="$ ".number_format($egresos, 2);?> -- <b>Disponible:</b> <?="$ ".number_format($ingresos-$egresos, 2);?></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?=base_url('inc/js/programados.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#cbocuentas').change(function(){
            urlbase = "<?php echo base_url('index.php/programados/filtroprogramados'); ?>";
            urlbaser = "<?php echo base_url('index.php/programados/importarrubros2'); ?>";
            idcuenta = $(this).val();
            idrubro = 0;
            cargarubros(idcuenta,urlbaser);
            cargarlistadoprog(urlbase,idcuenta,idrubro);
        });
        $('#cborubros').change(function(){
            urlbase = "<?php echo base_url('index.php/programados/filtroprogramados'); ?>";
            idrubro = $(this).val();
            idcuenta = $('#cbocuentas').val();
            cargarlistadoprog(urlbase,idcuenta,idrubro);
        });
    });
</script>
</body>
</html>