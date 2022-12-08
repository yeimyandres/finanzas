<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Programado;
use App\Models\Ejecutado;
use App\Models\Cuenta;
use App\Models\Rubro;
use App\Models\Fuente;


class Balance extends Controller{

    public function index(){

        $programado = new Programado();


        $insql = "SELECT p.fechalimite, c.tipomovimiento, c.nombre AS nombrec, r.nombre AS nombrer, p.valor AS valorp, SUM(e.valor) AS valore";
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

}