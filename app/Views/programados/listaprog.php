<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creaprogramado')?>">Programar Nuevo Ingreso/Egreso</a>
</br>
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
<script>
    $(document).ready(function(){
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