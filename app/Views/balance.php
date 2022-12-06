<?=$cabecera?>
<br/>
<h2>Saldos disponibles</h2>
<table class="table table-light">
    <thead class="thead-light">
        <tr align='center'>
            <th>Fuente Dinero</th>
            <th>Valor ingresos</th>
            <th>Valor egresos</th>
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
                if ($fuente->tipofuente=='B'){
                    if($fuente->tipomovimiento=='I'){
                        $bancosi = $fuente->valore;
                    }else{
                        $bancose = $fuente->valore;
                    }
                }elseif ($fuente->tipofuente='E'){
                    if($fuente->tipomovimiento=='I'){
                        $efectivoi = $fuente->valore;
                    }else{
                        $efectivoe = $fuente->valore;
                    }
                }else{
                    $tarjetae = $fuente->valore;
                }
            endforeach;
            $bancose = $bancose - $tarjetae;
        ?>
        <tr align='right'>
            <td align='center'>Bancos</td>
            <td><?="$ ".number_format($bancosi,2)?></td>
            <td><?="$ ".number_format($bancose,2)?></td>
            <td><?="$ ".number_format($bancosi-$bancose,2)?></td>
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
<table class="table table-light">
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
        <?php foreach($ejecutados->getResult() as $ejecutado):?>
            
            <tr align='center'>
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
                <td align = 'right'>
                    <?php
                        if(is_null($ejecutado->valore)){
                            $valorejecutado = 0;
                        }else{
                            $valorejecutado = $ejecutado->valore;
                        }
                        
                        echo "$ ".number_format($valorejecutado,2)
                    ?>
                </td>
                <?php
                    $saldo = $ejecutado->valorp - $ejecutado->valore;
                    if ($saldo > 0){
                        $disponible = "$ ".number_format($saldo,2);
                    }else{
                        $disponible = "Pagado";
                    }
                ?>
                <td align='right'><?=$disponible?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?=$pie?>