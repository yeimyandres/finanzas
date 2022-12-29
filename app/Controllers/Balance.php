<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Programado;
use App\Models\Movimiento;
use App\Models\Ejecutado;
use App\Models\Cuenta;
use App\Models\Rubro;
use App\Models\Fuente;


class Balance extends Controller{

    public function index(){

        $programado = new Programado();


        $insql = "SELECT p.fechalimite, c.tipomovimiento, c.nombre AS nombrec, r.nombre AS nombrer, p.valor AS valorp, SUM(e.valor) AS valore, p.estado";
        $insql .= " FROM programados AS p ";
        $insql .= " JOIN rubros AS r ON p.idrubro = r.id JOIN cuentas AS c ON r.idcuenta = c.id LEFT JOIN ejecutados AS e ON e.idprogramado = p.id ";
        //$insql .= " WHERE c.tipomovimiento = 'E'";
        $insql .= " GROUP BY p.id ORDER BY c.tipomovimiento DESC, p.fechalimite ASC, c.nombre, r.nombre;";

        $datos['ejecutados'] = $programado->query($insql);

        $insql = "SELECT c.tipomovimiento, f.tipofuente, SUM(e.valor) AS valore";
        $insql .= " FROM cuentas AS c, rubros AS r, ejecutados AS e, fuentes AS f, programados AS p";
        $insql .= " WHERE r.idcuenta=c.id AND f.id = e.idfuente AND p.idrubro = r.id AND e.idprogramado = p.id";
        $insql .= " GROUP BY c.tipomovimiento, f.tipofuente;";

        $datos['fuentes'] = $programado->query($insql);

        $insql = "SELECT transaccion, SUM(valor) AS valort FROM movimientos GROUP BY transaccion";

        $datos['movimientos'] = $programado->query($insql);

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');
        
        return view('balance',$datos);

    }

    public function pagatarjeta(){

        $tarjeta = new Ejecutado();

        $fuente = 2;

        //$tarjeta->update()

        $tarjeta->set('idfuente', $fuente)->where('idfuente', 3)->update();

        //$tarjeta->update($datos);

    }

    public function cerrarperiodo(){

        $periodo = new ejecutado();
        $movimientos = new movimiento();

        $db = db_connect();

        $insql = "INSERT INTO historicos";
        $insql .= " SELECT e.fecha, c.tipomovimiento, f.nombre, c.nombre, r.nombre, e.detalle, e.valor";
        $insql .= " FROM programados AS p, ejecutados AS e, rubros AS r, cuentas AS c, fuentes AS f";
        $insql .= " WHERE p.idrubro = r.id AND e.idprogramado = p.id AND e.idfuente = f.id AND r.idcuenta = c.id";

        $program = $periodo->query($insql);
        
        $insql = "UPDATE programados SET fechalimite = DATE_ADD(fechalimite, interval 30 day);";

        $program = $periodo->query($insql);

        $periodo->emptyTable('ejecutados');
        $movimientos->emptyTable('movimientos');

        return $this->response->redirect(site_url('/listaprogramados'));
    

    }

}