<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Cuenta;
use App\Models\Rubro;

class Rubros extends Controller{

    public function index(){

        $rubro = new Rubro();
        $datos['rubros'] = $rubro->query('select c.nombre as nomcuenta, c.tipomovimiento, r.* from cuentas as c, rubros as r where r.idcuenta = c.id order by c.tipomovimiento DESC, c.nombre ASC');
        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');
        
        return view('rubros/listarubros',$datos);

    }

    public function crear(){

        $cuenta = new Cuenta();
        $datos['cuentas'] = $cuenta->orderBy('tipomovimiento DESC, nombre ASC')->findAll();
        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('rubros/crearubro',$datos);
    }

    public function guardar(){

        $rubro = new Rubro();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required|min_length[3]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }else{

            $datos=[
                'idcuenta'=>$this->request->getVar('cuentas'),
                'nombre'=>$this->request->getVar('nombre'),
                'descripcion'=>$this->request->getVar('descripcion')
            ];
     
            $rubro->insert($datos);
     
        }

        return $this->response->redirect(site_url('/listarubros'));

    }


    public function borrar($id=null){

        $rubro = new rubro();

        $datosrubro = $rubro->where('id',$id)->first();        

        $rubro->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listarubros'));

    }

    public function editar($id=null){

        $rubro = new rubro();

        $datos['rubro'] = $rubro->where('id',$id)->first();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('rubros/editarubro', $datos);

    }

    public function actualizar(){

        $rubro = new rubro();

        $datos=[
            'idcuenta'=>$this->request->getVar('cuentas'),
            'nombre'=>$this->request->getVar('nombre'),
            'descripcion'=>$this->request->getVar('descripcion')
        ];

        $id = $this->request->getVar('id');

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required|min_length[3]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }

        $rubro->update($id,$datos);

        return $this->response->redirect(site_url('/listarubros'));

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

    public function importarcuentase(){
        
        $cuenta = new Cuenta();

        $tipomov = $this->request->getPost('tipomov');
        $idcuenta = $this->request->getPost('idcuenta');

        $datoscuenta = $cuenta->where('tipomovimiento',$tipomov)->orderBY('nombre','ASC')->findAll();

        $respuesta = "<label for='cuentas'>Cuentas:";
        $respuesta .= "</label>";
        $respuesta .= "<select class='custom-select' name='cuentas' id='cuentas'>";
        $respuesta .= "<option value='0'>Seleccione una cuenta...</option>";

        foreach($datoscuenta as $registro):

            $respuesta .= "<option value='".$registro['id']."'";
            if ($idcuenta == $registro['id']) {
                $respuesta .= " selected>".$registro['nombre']."</option>";
            }
            else{
                $respuesta .= ">".$registro['nombre']."</option>";
            }

            
        
        endforeach;

        $respuesta .= "</select>";

        return $respuesta;

    }
    
}