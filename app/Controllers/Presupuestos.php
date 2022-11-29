<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Presupuesto;

class Presupuestos extends Controller{

    public function index(){

        $presupuesto = new presupuesto();
        $datos['presupuestos'] = $presupuesto->orderBy('vigencia ASC, mes ASC')->findAll();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');
        
        return view('presupuestos/listapresupuestos',$datos);

    }

    public function crear(){

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('presupuestos/creapresupuesto',$datos);
    }

    public function guardar(){

        $presupuesto = new presupuesto();

        $validacion = $this->validate([
            'vigencia' => 'required|min_length[4]',
            'mes' => 'required|min_length[2]',
            'descripcion' => 'required|min_length[3]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }else{

            $fecha_actual = date("Y-m-d");

            $datos=[
                'creado'=>$fecha_actual,
                'vigencia'=>$this->request->getVar('vigencia'),
                'mes'=>$this->request->getVar('mes'),
                'descripcion'=>$this->request->getVar('descripcion')
            ];
     
            $presupuesto->insert($datos);
     
        }

        return $this->response->redirect(site_url('/listapresupuestos'));

    }


    public function borrar($id=null){

        $presupuesto = new presupuesto();

        $datospresupuesto = $presupuesto->where('id',$id)->first();        

        $presupuesto->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listapresupuestos'));

    }

    public function editar($id=null){

        $presupuesto = new presupuesto();

        $datos['presupuesto'] = $presupuesto->where('id',$id)->first();

        $datos['cabecera']=view('plantilla/cabecera');
        $datos['pie']=view('plantilla/pie');

        return view('presupuestos/editapresupuesto', $datos);

    }

    public function actualizar(){

        $presupuesto = new presupuesto();

        $datos=[
            'vigencia'=>$this->request->getVar('vigencia'),
            'mes'=>$this->request->getVar('mes'),
            'descripcion'=>$this->request->getVar('descripcion')
        ];

        $id = $this->request->getVar('id');

        $validacion = $this->validate([
            'vigencia' => 'required|min_length[4]',
            'mes' => 'required|min_length[2]',
            'descripcion' => 'required|min_length[3]'
        ]);

        if(!$validacion){

            $sesion = session();
            $sesion->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();

        }

        $presupuesto->update($id,$datos);

        return $this->response->redirect(site_url('/listapresupuestos'));

    }


}