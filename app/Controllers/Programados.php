<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Programado;
use App\Models\Cuenta;
use App\Models\Rubro;


class Programados extends Controller{

    public function index(){

        $programado = new programado();

        $datos['programados'] = $programado->query('select r.nombre, p.id, p.fecha, p.detalle, p.valor, c.tipomovimiento, c.nombre as nomcuenta from programacion as p, rubros as r, cuentas as c where p.idrubro = r.id and r.idcuenta = c.id order by c.tipomovimiento DESC, c.nombre ASC');

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
            'nombre' => 'required|min_length[3]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }else{

            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'tipomovimiento'=>$this->request->getVar('movimiento')
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

}