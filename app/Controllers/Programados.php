<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Programado;
use App\Models\Cuenta;
use App\Models\Rubro;


class Programados extends Controller{

    public function index(){

        $programado = new programado();

        $datos['programados'] = $programado->query('select r.nombre, p.id, p.fechalimite, p.detalle, p.valor, p.estado, c.tipomovimiento, c.nombre as nomcuenta from programados as p, rubros as r, cuentas as c where p.idrubro = r.id and r.idcuenta = c.id order by c.tipomovimiento DESC, c.nombre ASC');

        //$datos['programados'] = $programado->orderBy('tipomovimiento DESC, nombre ASC')->findAll();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');
        
        return view('programados/listaprog',$datos);

    }

    public function crear(){

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('programados/creaprog',$datos);
    }

    public function guardar(){

        $programado = new programado();

        $validacion = $this->validate([
            'fechalimite' => 'required|min_length[10]',
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
     
            $programado->insert($datos);
     
        }

        return $this->response->redirect(site_url('/listaprogramados'));

    }


    public function borrar($id=null){

        $programado = new programado();

        $datosprogramado = $programado->where('id',$id)->first();        

        $programado->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listaprogramados'));

    }

    public function editar($id=null){

        $programado = new programado();
        $datos['programado'] = $programado->where('id',$id)->first();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('programados/editaprog', $datos);

    }

    public function actualizar(){

        $programado = new programado();

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

        $programado->update($id,$datos);

        return $this->response->redirect(site_url('/listaprogramados'));

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

}