<?=$cabecera?>
<div class="card ">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de registro a programar</h5>
        <p class="card-text">

            <form method="post" action="<?=base_url('/guardaprogramado')?>" enctype="multipart/form-data">
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
                <div class="row">
                    <div class="form-group col">
                        <label for="fechalimite">Fecha límite pago:</label>
                        <input id="fechalimite" class="form-control" type="date" name="fechalimite">
                    </div>
                    <div class="form-group col-md">
                        <label for="detalle">Detalle del pago:</label>
                        <input id="detalle" value="<?=old('detalle')?>" class="form-control" type="text" name="detalle">
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor del pago:</label>
                        <input id="valor" class="form-control" type="text" name="valor">
                    </div>
                    </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listaprogramados');?>" class="btn btn-info">Cancelar</a>
            </form>

        </p>
    </div>
</div>
</br>
<h2>Pagos programados en el presupuesto actual</h2>
</br>
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
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
<script src="<?=base_url('inc/js/programados.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tipomovimiento').change(function(){
            urlbasec = "<?php echo base_url('index.php/programados/importarcuentas'); ?>";
            urlbaser = "<?php echo base_url('index.php/programados/importarrubros'); ?>";
            tipomovimiento = $(this).val();
            cargacuentas(tipomovimiento,urlbasec,urlbaser);
        });
        var table = $('#tblProgramados').DataTable({
            "lengthMenu": [5, 10, 15, 20, 25],
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
            }
        });
    });
</script>
</body>
</html>