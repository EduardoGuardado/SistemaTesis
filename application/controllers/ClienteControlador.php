<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteControlador extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model("ClienteModel");
    }

    public function index()
	{
		$data['ListaClientes']	= $this->ClienteModel->Listar();
		$this->load->view('comun/header');
		$this->load->view('cliente/index', $data);
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
			$this->load->view('cliente/insertar');
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
            $data["cliente"] = $this->ClienteModel->Consultar($id);
            $data["id"] = $id;

			$this->load->view('comun/header');
			$this->load->view('cliente/editar', $data);
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

			$this->load->view('cliente/tabla_cliente', $data);
		}
	}
}
