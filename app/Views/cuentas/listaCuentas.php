<?=$cabecera?>
<br/>
<a class="btn btn-success" href="<?=base_url('creacuenta')?>">Crear nueva cuenta</a>
<br/>
</br>
<h2>Cuentas registradas</h2>
<br/>
<table class="table table-light" id='tblCuentas'>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tblCuentas').DataTable({
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
            "lengthMenu": [10, 20, 30, 40]
        });
    });
</script>
</body>
</html>