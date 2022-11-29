<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Cuenta;

class Cuentas extends Controller{

    public function index(){

        $cuenta = new Cuenta();
        $datos['cuentas'] = $cuenta->orderBy('tipomovimiento DESC, nombre ASC')->findAll();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');
        
        return view('cuentas/listaCuentas',$datos);

    }

    public function crear(){

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('cuentas/creaCuenta',$datos);
    }

    public function guardar(){

        $cuenta = new Cuenta();

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
     
            $cuenta->insert($datos);
     
        }

        return $this->response->redirect(site_url('/listacuentas'));

    }


    public function borrar($id=null){

        $cuenta = new cuenta();

        $datoscuenta = $cuenta->where('id',$id)->first();        

        $cuenta->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listacuentas'));

    }

    public function editar($id=null){

        $cuenta = new cuenta();
        $datos['cuenta'] = $cuenta->where('id',$id)->first();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('cuentas/editacuenta', $datos);

    }

    public function actualizar(){

        $cuenta = new Cuenta();

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

        $cuenta->update($id,$datos);

        return $this->response->redirect(site_url('/listacuentas'));

    }

}