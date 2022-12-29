<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('registramovimiento')?>">Registrar movimientos de dinero</a>
</br>
</br>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar nueva ejecución</h5>
        <p class="card-text">

            <form method="post" action="<?=base_url('/guardaejecutado')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="tipomovimiento">Tipo de movimiento:</label>
                        <select class='custom-select' name="tipomovimiento" id="tipomovimiento">
                            <option value="0">Seleccione tipo de cuenta</option>
                            <option value="E">Cuenta de Egreso</option>
                            <option value="I">Cuenta de Ingreso</option>
                        </select>
                    </div>
                    <div class="form-group col-sm" id="cbocuentas">
                    </div>
                    <div class="form-group col-sm" id="cborubros">
                    </div>
                </div>
                <div class="form-group col-sm" id="pagosprogramados">
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="cbofuentes">Fuente del pago:</label>
                        <select class='custom-select' name="cbofuentes" id="cbofuentes">
                            <option value="0">Seleccione fuente del pago:</option>
                            <?php foreach($fuentes as $fuente):?>
                                <option value="<?=$fuente['id']?>"><?php echo $fuente['nombre']." (".$fuente['tipofuente'].")";?></option>
                            <?php endforeach;?>    
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="fecha">Fecha límite pago:</label>
                        <input id="fecha" class="form-control" type="date" name="fecha" value="<?=date('Y-m-d');?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="detalle">Detalle del pago:</label>
                        <input id="detalle" value="<?=old('detalle')?>" class="form-control" type="text" name="detalle">
                    </div>
                    <div class="form-group col-sm">
                        <label for="valor">Valor del pago:</label>
                        <input id="valor" class="form-control" type="text" name="valor">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listaejecutados');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>
</br>
<h2>Pagos realizados durante la ejecución del presupuesto</h2>
</br>
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
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('inc/js/ejecutados.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tipomovimiento').change(function(){
            urlbasec = "<?php echo base_url('index.php/ejecutados/importarcuentas'); ?>";
            urlbaser = "<?php echo base_url('index.php/ejecutados/importarrubros'); ?>";
            urlbasep = "<?php echo base_url('index.php/ejecutados/importarprogs'); ?>";
            tipomovimiento = $(this).val();
            cargacuentas(tipomovimiento,urlbasec,urlbaser,urlbasep);
        });
        $('#tblEjecutados').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron registros",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando..."
            },
            "lengthMenu": [5, 10, 15, 20, 25]
        });
    });
</script>
</body>
</html>