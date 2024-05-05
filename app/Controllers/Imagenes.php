<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\imagen;
class Imagenes extends Controller{

    public function index(){
    
        $imagen = new Imagen();
        $datos['imagenes'] = $imagen->orderBy('id','ASC')->findAll();

        $datos['cabecera'] = view('template/cabecera');
        $datos['piepagina'] = view('template/piepagina');

        return view('imagenes/listar',$datos);
    }

    public function crear(){
        $datos['cabecera'] = view('template/cabecera');
        $datos['piepagina'] = view('template/piepagina');

        return view('imagenes/crear',$datos);
    }
    public function guardar(){

        $imagenModel = new imagen();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,4096]',
            ]
        ]);

        if(!$validacion){
            session();
            session()->setFlashdata('mensaje','Error en la validación de datos');

            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('crear'));
        }

        if($imagenFile=$this->request->getFile('imagen')){
            $nuevoNombre = $imagenFile->getRandomName();
            $imagenFile->move('../public/uploads',$nuevoNombre);
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'imagen' => $nuevoNombre
            ];

            $imagenModel->insert($datos);

        }

        return $this->response->redirect(site_url('listar'));
    }

    public function eliminar($id=null){

        $imagenModel = new imagen();
        $imagen = $imagenModel->where('id',$id)->first();

        $ruta = ('../public/uploads/'.$imagen['imagen']);
        unlink($ruta);

        $imagenModel->where('id',$id)->delete($id);
    
        return $this->response->redirect(site_url('listar'));
    }

    public function editar($id=null){

        $imagenModel = new imagen();
        $datos ['imagen'] = $imagenModel->where('id',$id)->first();

        $datos['cabecera'] = view('template/cabecera');
        $datos['piepagina'] = view('template/piepagina');

        return view('imagenes/editar',$datos);
    }
    
    public function actualizar(){
        $imagenModel = new imagen();

        $datos = [
            'nombre' => $this->request->getVar('nombre'),
        ];

        $id = $this->request->getVar('id');

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,4096]',
            ]
        ]);

        if(!$validacion){
            session();
            session()->setFlashdata('mensaje','Error en la validación de datos');

            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('crear'));
        }

        $imagenModel->update($id, $datos);

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,4096]',
            ]
        ]);

        
        if($validacion){
            if($imagen=$this->request->getFile('imagen')){

                $datosimagen = $imagenModel->where('id',$id)->first();
                $ruta = ('../public/uploads/'.$datosimagen['imagen']);
                
                if(file_exists($ruta)) {
                    unlink($ruta);
                }

                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads',$nuevoNombre);
                $datos = [
                    'imagen' => $nuevoNombre
                ];
                $imagenModel->update($id,$datos);



            }
        }

        return $this->response->redirect(site_url('/listar'));
        
    }
}