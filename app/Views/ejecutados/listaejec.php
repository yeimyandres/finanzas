<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creaejecutado')?>">Registrar ejecución de presupuesto</a>
<a class="btn btn-success" href="<?=base_url('registramovimiento')?>">Registrar movimientos de dinero</a>
</br>
</br>
<div class="row">
    <div class="col">
        <label for='cbocuentas'>Cuentas: </label>
        <select class='custom-select' id="cbocuentas" name="cbocuentas">
            <option value='0'>Seleccione una cuenta...</option>
        <?php
        foreach($fltcuentas->getResult() as $fltcuenta):
            echo "<option value='".$fltcuenta->id."'>".$fltcuenta->nombre."</option>";
        endforeach;
        ?>
        </select>
    </div>
    <div class="col">
        <label for='cborubros'>Rubros:</label>
        <select class='custom-select' id="cborubros" name="cborubros">
        </select>
    </div>
</div>
<br/>

<table class="table table-sm table-light" id="tblEjecutados">
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
                <td><?=$ejecutado->valord;?></td>
                <td align='right'><?=number_format($ejecutado->valore, 2);?></td>
                <?php
                    if ($ejecutado->tipomovimiento == 'I'){
                        if ($ejecutado->tipofuente=='B'){
                            $ingresosb += $ejecutado->valore;
                        }else{
                            $ingresose += $ejecutado->valore;
                        }
                    }else{
                        if ($ejecutado->tipofuente=='B'){
                            $egresosb += $ejecutado->valore;
                        }else{
                            $egresose += $ejecutado->valore;
                        }
                    }
                ?>
                <td align='center'>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?=base_url('inc/js/ejecutados.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tblEjecutados tbody').css("display", "none");
        $('#cbocuentas').change(function(){
            urlbase = "<?php echo base_url('index.php/ejecutados/filtroejecutados'); ?>";
            urlbaser = "<?php echo base_url('index.php/ejecutados/importarrubros2'); ?>";
            idcuenta = $(this).val();
            idrubro = 0;
            cargarubros(idcuenta,urlbaser);
            cargarlistadoejec(urlbase,idcuenta,idrubro);
            $('#tblEjecutados tbody').show("fast");
        });
        $('#cborubros').change(function(){
            urlbase = "<?php echo base_url('index.php/ejecutados/filtroejecutados'); ?>";
            idrubro = $(this).val();
            idcuenta = $('#cbocuentas').val();
            cargarlistadoejec(urlbase,idcuenta,idrubro);
        });
        $('#tblEjecutados thead').click(function(){
            $('#tblEjecutados tbody').toggle();
        });
    });
</script>
</body>
</html>