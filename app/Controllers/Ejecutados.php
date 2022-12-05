<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Programado;
use App\Models\Ejecutado;
use App\Models\Cuenta;
use App\Models\Rubro;
use App\Models\Fuente;


class ejecutados extends Controller{

    public function index(){

        $ejecutado = new Ejecutado();

        $insql = "SELECT p.valor AS valorp, p.detalle AS detallep, p.fechalimite, f.nombre AS nombref, f.tipofuente, r.nombre AS nombrer, c.nombre AS nombrec, e.fecha, e.detalle, e.valor AS valore, e.detalle AS valord ";
        $insql .= "FROM programados AS p, fuentes AS f, rubros AS r, cuentas AS c, ejecutados AS e ";
        $insql .= "WHERE p.idrubro = r.id AND f.id = e.idfuente AND r.idcuenta = c.id AND e.idprogramado = p.id ";
        $insql .= "ORDER BY tipofuente DESC, nombrec ASC, fechalimite ASC";

        $datos['ejecutados'] = $ejecutado->query($insql);

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

        $idprog = $this->request->getPost('progs');

        $ejecutado = new Ejecutado();

        $validacion = $this->validate([
            'fecha' => 'required|min_length[10]',
            'detalle' => 'required|min_length[3]',
            'valor' => 'required|min_length[4]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }else{

            $fecha = date("Y-m-d");

            $datos=[
                'fechalimite'=>$this->request->getVar('fechalimite'),
                'idrubro'=>$this->request->getVar('rubros'),
                'detalle'=>$this->request->getVar('detalle'),
                'valor'=>$this->request->getVar('valor')
            ];
     
            $ejecutado->insert($datos);
     
        }

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

        $idrubro = $this->request->getPost('idrubro');

        $datosprog = $programa->where('idrubro',$idrubro)->orderBy('fechalimite','ASC')->findAll();

        $respuesta = "";

        foreach($datosprog as $registro):

            $fecha = date_create($registro['fechalimite']);
            $respuesta .= "<input class='form-check-input' type='radio' name='progs' value='".$registro['id']."'>";
            $respuesta .= "<label class='form-check-label' for='progs'> Pago pendiente: (".date_format($fecha,"j-M-Y").") ".$registro['detalle']."</label></br>";
        
        endforeach;

        return $respuesta;

    }

}