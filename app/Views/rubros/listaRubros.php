<?=$cabecera?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de rubro</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardarubro')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="tipomovimiento">Tipo de movimiento:</label>
                        <select class='custom-select' name="tipomovimiento" id="tipomovimiento">
                            <option value="0">Seleccione un tipo de cuenta...</option>
                            <option value="I">Cuenta de ingreso</option>
                            <option value="E">Cuenta de egreso</option>
                        </select>
                    </div>

                    <div class="form-group col-sm" id='cbocuentas'>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm">
                        <label for="nombre">Nombre Rubro:</label>
                        <input id="nombre" value="<?=old('nombre')?>" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group col-sm">
                        <label for="descripcion">Descripción Rubro:</label>
                        <input id="descripcion" value="<?=old('descripcion')?>" class="form-control" type="text" name="descripcion">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listarubros');?>" class="btn btn-info">Cancelar</a>
            </form>
        </p>
    </div>
</div>
<br/>
</br>
<h2>Rubros registrados</h2>
<br/>

<table class="table table-light" id='tblRubros'>
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

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('inc/js/rubros.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tipomovimiento').change(function(){
            urlbase = "<?php echo base_url('index.php/rubros/importarcuentas'); ?>";
            tipomovimiento = $(this).val();
            cargacuentas(tipomovimiento,urlbase);
        });
        $('#tblRubros').DataTable({
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
            "lengthMenu": [5, 10, 15, 20]
        });
    });
</script>
</body>
</html>