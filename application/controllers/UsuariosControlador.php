<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosControlador extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model("UsuariosModel");
    }

    public function index()
	{
		$data['ListaUsuarios']	= $this->UsuariosModel->Listar();
		$this->load->view('comun/header');
		$this->load->view('usuarios/index', $data);
		$this->load->view('comun/footer');
	}

	public function insertar(){
		if($this->input->post()){
            if($this->ClienteModel->insertar($this->input->post())){
                echo 'ok';
            }else{
                echo '¡Ocurrió un error al guardar sus datos, por favor intente de nuevo!';
            }
		}else{
			$this->load->view('comun/header');
			$this->load->view('usuarios/insertar');
			$this->load->view('comun/footer');
		}
	}

	public function editar($id){
		if($this->input->post()){
            if($this->ClienteModel->actualizar($this->input->post(), $id)){
                echo 'ok';
            }else{
                echo '¡Ocurrió un error al actualizar sus datos, por favor intente de nuevo!';
            }
		}else{
            $data["usuarios"] = $this->ClienteModel->Consultar($id);
            $data["id"] = $id;

			$this->load->view('comun/header');
			$this->load->view('usuarios/editar', $data);
			$this->load->view('comun/footer');
		}
	}

	public function eliminar(){
		if($this->input->post()){
			$this->ClienteModel->Eliminar($this->input->post('id'));
			echo 'ok';
		}else{
			echo 'error';
		}
	}

	public function buscar(){
		if($this->input->post()){
			if($this->input->post('criterio')== "all")
				$data['ListaClientes'] 	=  $this->ClienteModel->Listar();
			else
				$data['ListaClientes'] 	= $this->ClienteModel->Buscar($this->input->post('criterio'));

			$this->load->view('usuarios/tabla_usuarios', $data);
		}
	}
}
