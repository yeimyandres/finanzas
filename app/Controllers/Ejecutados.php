<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Programado;
use App\Models\Ejecutado;
use App\Models\Cuenta;
use App\Models\Rubro;
use App\Models\Fuente;
use App\Models\Movimiento;


class ejecutados extends Controller{

    public function index(){

        $ejecutado = new Ejecutado();

        $insql = "SELECT p.id AS idprog, p.valor AS valorp, p.detalle AS detallep, p.fechalimite, f.nombre AS nombref, f.tipofuente, r.nombre AS nombrer, c.nombre AS nombrec, c.tipomovimiento, e.id, e.fecha, e.detalle, e.valor AS valore, e.detalle AS valord ";
        $insql .= "FROM programados AS p, fuentes AS f, rubros AS r, cuentas AS c, ejecutados AS e ";
        $insql .= "WHERE p.idrubro = r.id AND f.id = e.idfuente AND r.idcuenta = c.id AND e.idprogramado = p.id ";
        $insql .= "ORDER BY c.tipomovimiento DESC, e.fecha ASC, c.nombre ASC, r.nombre ASC";

        $datos['ejecutados'] = $ejecutado->query($insql);
        $datos['fltcuentas'] = $ejecutado->query("SELECT id,nombre FROM cuentas ORDER BY nombre");
        $datos['fltrubros'] = $ejecutado->query("SELECT id,nombre FROM rubros ORDER BY nombre");

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');
        
        return view('ejecutados/listaejec',$datos);

    }

    public function crear(){

        $fuente = new Fuente();

        $datos['fuentes'] = $fuente->orderBy('tipofuente, nombre ASC')->findAll();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('ejecutados/creaejec',$datos);
    }

    public function guardar(){

        $ejecutado = new Ejecutado();
        $programado = new Programado();

        $validacion = $this->validate([
            'detalle' => 'required|min_length[3]',
            'valor' => 'required|min_length[4]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }else{

            $datos=[
                'idprogramado'=>$this->request->getVar('progs'),
                'idfuente'=>$this->request->getVar('cbofuentes'),
                'fecha'=>$this->request->getVar('fecha'),
                'detalle'=>$this->request->getVar('detalle'),
                'valor'=>$this->request->getVar('valor')
            ];
     
            $ejecutado->insert($datos);
     
        }

        $idprog = $this->request->getVar('progs');
        $valore = 0;
        $datosprogramado = $programado->where('id',$idprog)->first();
        
        $datosejecutado = $ejecutado->where('idprogramado',$idprog)->findAll();
        
        foreach($datosejecutado as $datosejec):
            $valore += $datosejec['valor'];
        endforeach;

        $valorp = $datosprogramado['valor'];

        if ($valore < $valorp){
            $datosp=[
                'estado'=>'E'
            ];                
        }else{
            $datosp=[
                'estado'=>'T'
            ];    
        }

        $programado->update($idprog,$datosp);

        return $this->response->redirect(site_url('/listaejecutados'));

    }


    public function borrar($id=null){

        $ejecutado = new ejecutado();

        $datosejecutado = $ejecutado->where('id',$id)->first();        

        $ejecutado->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listaejecutados'));

    }

    public function editar($id=null){

        $ejecutado = new ejecutado();
        $datos['ejecutado'] = $ejecutado->where('id',$id)->first();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('ejecutados/editaprog', $datos);

    }

    public function actualizar(){

        $ejecutado = new ejecutado();

        $datos=[
            'nombre'=>$this->request->getVar('nombre'),
            'tipomovimiento'=>$this->request->getVar('movimiento')
        ];

        $id = $this->request->getVar('id');

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }

        $ejecutado->update($id,$datos);

        return $this->response->redirect(site_url('/listaejecutados'));

    }

    public function movimientos(){

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('movimientos/crear', $datos);
    }

    public function guardamovimientos(){

        $movimiento = new Movimiento();

        $validacion = $this->validate([
            'detalle' => 'required|min_length[3]',
            'valor' => 'required|min_length[1]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }else{

            $datos=[
                'transaccion'=>$this->request->getVar('transaccion'),
                'fecha'=>$this->request->getVar('fecha'),
                'detalle'=>$this->request->getVar('detalle'),
                'valor'=>$this->request->getVar('valor')
            ];
     
            $movimiento->insert($datos);
     
        }

        return $this->response->redirect(site_url('/listaejecutados'));

    }

    public function importarcuentas(){
        
        $cuenta = new Cuenta();

        $tipomov = $this->request->getPost('tipomov');

        $datoscuenta = $cuenta->where('tipomovimiento',$tipomov)->orderBY('nombre','ASC')->findAll();

        $respuesta = "<label for='cuentas'>Cuentas:";
        $respuesta .= "</label>";
        $respuesta .=  "<select class='custom-select' name='cuentas' id='cuentas'>";
        $respuesta .= "<option value='0'>Seleccione una cuenta...</option>";

        foreach($datoscuenta as $registro):

            $respuesta .= "<option value='".$registro['id']."'>".$registro['nombre']."</option>";
        
        endforeach;

        $respuesta .= "</select>";

        return $respuesta;

    }

    public function importarrubros(){
        
        $rubro = new Rubro();

        $idcuenta = $this->request->getPost('idcuenta');

        $datosrubro = $rubro->where('idcuenta',$idcuenta)->orderBy('nombre','ASC')->findAll();

        $respuesta = "<label for='rubros'>Rubros: </label>";
        $respuesta .=  "<select class='custom-select' name='rubros' id='rubros'>";
        $respuesta .= "<option value='0'>Seleccione un rubro...</option>";

        foreach($datosrubro as $registro):

            $respuesta .= "<option value='".$registro['id']."'>".$registro['nombre']."</option>";
        
        endforeach;

        $respuesta .= "</select>";

        return $respuesta;

    }

    public function importarprogs(){
        
        $programa = new Programado();
        $ejecutado = new Ejecutado();

        $idrubro = $this->request->getPost('idrubro');

        $datosprog = $programa->query("SELECT * FROM programados WHERE idrubro = ".$idrubro." AND (estado = 'P' OR estado = 'E') ORDER BY fechalimite ASC;");

            $respuesta = "";

            foreach($datosprog->getResult() as $registro):

                $ejec = $ejecutado->where('idprogramado',$registro->id)->findAll();
                $valore = 0;
                foreach($ejec as $datosejec):
                    $valore += $datosejec['valor'];
                endforeach;
                $saldo = $registro->valor - $valore;
                $fecha = date_create($registro->fechalimite);
                $respuesta .= "<div class='form-check'>";
                $respuesta .= "<label class='form-check-label' for='progs'>";
                $respuesta .= "<input class='form-check-input' type='radio' name='progs' value='".$registro->id."'> Pago pendiente: (";
                $respuesta .= date_format($fecha,"j-M-Y").") ".$registro->detalle." (".number_format($saldo,2).")";
                $respuesta .= "</label></div>";
            
            endforeach;    

        return $respuesta;
    
    }

    public function importarrubros2(){
        
        $rubro = new Rubro();

        $idcuenta = $this->request->getPost('idcuenta');

        $datosrubro = $rubro->where('idcuenta',$idcuenta)->orderBy('nombre','ASC')->findAll();

        $respuesta = "<option value='0'>Seleccione un rubro...</option>";

        foreach($datosrubro as $registro):

            $respuesta .= "<option value='".$registro['id']."'>".$registro['nombre']."</option>";
        
        endforeach;

        return $respuesta;
    }

    public function filtroejecutados(){

        $ejecutados = new ejecutado();

        $idcuenta = $this->request->getPost('idcuenta');
        $idrubro = $this->request->getPost('idrubro');


        $insql = "SELECT p.id AS idprog, p.valor AS valorp, p.detalle AS detallep, p.fechalimite, f.nombre AS nombref, f.tipofuente, r.nombre AS nombrer, c.nombre AS nombrec, c.tipomovimiento, e.id, e.fecha, e.detalle, e.valor AS valore, e.detalle AS valord";
        $insql .= " FROM programados AS p, fuentes AS f, rubros AS r, cuentas AS c, ejecutados AS e";
        $insql .= " WHERE p.idrubro = r.id AND f.id = e.idfuente AND r.idcuenta = c.id AND e.idprogramado = p.id";
        if ($idcuenta <> 0){
            $insql .= " AND c.id = ".$idcuenta;
        }
        if ($idrubro <> 0){
            $insql .= " AND r.id = ".$idrubro;
        }
        $insql .= " ORDER BY c.tipomovimiento DESC, e.fecha ASC, c.nombre ASC, r.nombre ASC";

        $datosejecutados = $ejecutados->query($insql);

        $ingresosb = 0;
        $ingresose = 0;
        $egresosb = 0;
        $egresose = 0;

        foreach($datosejecutados->getResult() as $ejecutado):

            echo "<tr>";

                $fecha = date_create($ejecutado->fecha);
                
                echo "<td align='center'>".date_format($fecha,"j-M-Y")."</td>";
                echo "<td align='center'>".$ejecutado->nombref."</td>";
                echo "<td>".$ejecutado->nombrer."</td>";
                echo "<td>".$ejecutado->valord."</td>";
                echo "<td align='right'>".number_format($ejecutado->valore, 2)."</td>";

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

                echo "<td align='center'>";
                echo "<a href='".base_url('editaejecutado/'.$ejecutado->id)."' class='btn btn-info btn-sm' type='button'>Editar</a>";
                echo "<a href='".base_url('borraejecutado/'.$ejecutado->id)."' class='btn btn-danger btn-sm' type='button'>Borrar</a>";
                echo "</td>";
            echo "</tr>";

        endforeach;

    }

}
