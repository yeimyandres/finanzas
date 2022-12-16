<?=$cabecera?>
<br/>
<h2>Balance General</h2>
<table class="table table-light" id="tblBalanceGeneral">
    <thead class="thead-light">
        <tr align='center'>
            <th>Tipo movimiento</th>
            <th>Valores Programados</th>
            <th>Valores ejecutados</th>
            <th>Valores pendientes</th>
        </tr>
    </thead>
    <tbody>

            <?php
                $programadototali = 0;
                $ejecutadototali = 0;
                $programadototale = 0;
                $ejecutadototale = 0;
                foreach($ejecutados->getResult() as $ejecutado):
                    if ($ejecutado->tipomovimiento=='I'){
                        $programadototali += $ejecutado->valorp;
                        $ejecutadototali += $ejecutado->valore;    
                    }else{
                        $programadototale += $ejecutado->valorp;
                        $ejecutadototale += $ejecutado->valore;    
                    }
                endforeach;
            ?>
        <tr align='right'>
            <td align='center'>Ingresos</td>
            <td><?="$ ".number_format($programadototali)?></td>
            <td><?="$ ".number_format($ejecutadototali)?></td>
            <td><?="$ ".number_format($programadototali-$ejecutadototali)?></td>
        </tr>
        <tr align='right'>
            <td align='center'>Egresos</td>
            <td><?="$ ".number_format($programadototale)?></td>
            <td><?="$ ".number_format($ejecutadototale)?></td>
            <td><?="$ ".number_format($programadototale-$ejecutadototale)?></td>
        </tr>
    </tbody>
</table>
<h2>Saldos disponibles</h2>
<table class="table table-light" id="tblSaldosDisponibles">
    <thead class="thead-light">
        <tr align='center'>
            <th>Fuente Dinero</th>
            <th>Valor ingresos + consignaciones</th>
            <th>Valor egresos + retiros</th>
            <th>Disponible</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $bancosi = 0;
            $bancose = 0;
            $efectivoi = 0;
            $efectivoe = 0;
            $tarjetai = 20000000;
            $tarjetae = 0;
            foreach($fuentes->getResult() as $fuente):

                switch($fuente->tipofuente){
                    case 'B':
                        switch($fuente->tipomovimiento){
                            case 'I':
                                $bancosi = $fuente->valore;
                                break;
                            case 'E':
                                $bancose = $fuente->valore;
                                break;
                        }
                        break;
                    case 'E':
                        switch($fuente->tipomovimiento){
                            case 'I':
                                $efectivoi = $fuente->valore;
                                break;
                            case 'E':
                                $efectivoe = $fuente->valore;
                                break;
                        }
                        break;
                    case 'T':
                        switch($fuente->tipomovimiento){
                            case 'I':
                                $tarjetai = $fuente->valore;
                                break;
                            case 'E':
                                $tarjetae = $fuente->valore;
                                break;
                        }
                        break;
                }

            endforeach;

            foreach($movimientos->getResult() as $movimiento):
                if ($movimiento->transaccion=='R'){
                    $bancose = $bancose + $movimiento->valort;
                    $efectivoi = $efectivoi + $movimiento->valort;
                }else{
                    $bancosi = $bancosi + $movimiento->valort;
                    $efectivoe = $efectivoe + $movimiento->valort;
                }
            endforeach;

        ?>
        <tr align='right'>
            <td align='center'>Bancos</td>
            <td><?="$ ".number_format($bancosi,2)?></td>
            <td><?="$ ".number_format($bancose,2)?></td>
            <td><?="$ ".number_format($bancosi-$bancose-$tarjetae,2)?></td>
        </tr>
        <tr align='right'>
            <td align='center'>Efectivo</td>
            <td><?="$ ".number_format($efectivoi,2)?></td>
            <td><?="$ ".number_format($efectivoe,2)?></td>
            <td><?="$ ".number_format($efectivoi-$efectivoe,2)?></td>
        </tr>
        <tr align='right'>
            <td align='center'>Tarjeta de crédito</td>
            <td><?="$ ".number_format($tarjetai,2)?></td>
            <td><?="$ ".number_format($tarjetae,2)?></td>
            <td><?="$ ".number_format($tarjetai-$tarjetae,2)?></td>
        </tr>
    </tbody>
</table>
</br>
<h2>Estado de rubros</h2>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radestado" id="radestado1" value="todos" checked>
  <label class="form-check-label" for="radestado1">
    Todos los registros
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radestado" id="radestado2" value="pagados">
  <label class="form-check-label" for="radestado2">
    Rubros pagados
  </label>
</div>  
<div class="form-check">
  <input class="form-check-input" type="radio" name="radestado" id="radestado3" value="pendientes">
  <label class="form-check-label" for="radestado3">
    Rubros pendientes de pago
  </label>
</div>
</br>
<table class="table table-light" id="tblEstadoRubros">
    <thead class="thead-light">
        <tr align='center'>
            <th>Tipo Movimiento</th>
            <th>Cuenta</th>
            <th>Rubro</th>
            <th>Fecha límite</th>
            <th>Valor programado</th>
            <th>Valor ejecutado</th>
            <th>Saldo Disponible</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ejecutados->getResult() as $ejecutado):
            
            if(is_null($ejecutado->valore)){
                $valorejecutado = 0;
            }else{
                $valorejecutado = $ejecutado->valore;
            }
            $saldo = $ejecutado->valorp - $ejecutado->valore;
            if ($saldo > 0){
                $disponible = "$ ".number_format($saldo,2);
                $clasefila = "";
            }else{
                $disponible = "Pagado";
                $clasefila = "class='font-italic text-muted'";
            }
            ?>
            <tr align='center' <?=$clasefila?>>
                <?php
                    if ($ejecutado->tipomovimiento == 'I'){
                        $movimiento = "Ingreso";
                    }else{
                        $movimiento = "Egreso";
                    }
                    $fecha = date_create($ejecutado->fechalimite);
                ?>
                <td><?=$movimiento;?></td>
                <td><?=$ejecutado->nombrec;?></td>
                <td><?=$ejecutado->nombrer;?></td>
                <td><?=date_format($fecha,"j-M-Y")?></td>
                <td align = 'right'><?="$ ".number_format($ejecutado->valorp,2);?></td>
                <td align = 'right'><?="$ ".number_format($valorejecutado,2)?></td>
                <td align='right'><?=$disponible?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?=base_url('inc/js/balance.js')?>"></script>
<script>
    $(document).ready(function(){
        $('#tblBalanceGeneral tbody').css("display","none");
        $('#tblSaldosDisponibles tbody').css("display","none");
        $('#tblEstadoRubros tbody').css("display","none");
        $('#tblBalanceGeneral thead').click(function(){
            $('#tblBalanceGeneral tbody').toggle();
        });
        $('#tblSaldosDisponibles thead').click(function(){
            $('#tblSaldosDisponibles tbody').toggle();
        });
        $('#tblEstadoRubros thead').click(function(){
            $('#tblEstadoRubros tbody').toggle();
        });
        urlbase = "<?php echo base_url('index.php/balance/cargarrubros'); ?>";
        $('#radestado1').click(function(){
            estado = $(this).val();
            cargarestadorubros(urlbase,estado);
        });
        $('#radestado2').click(function(){
            estado = $(this).val();
            cargarestadorubros(urlbase,estado);
        });
        $('#radestado3').click(function(){
            estado = $(this).val();
            cargarestadorubros(urlbase,estado);
        });
    });
</script>
</body>
</html>