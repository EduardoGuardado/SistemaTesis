<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfesionalControlador extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model("ProfesionalModel");
    }

    public function index()
	{
		$data['ListaProfesionales']	= $this->ProfesionalModel->Listar();
		$this->load->view('comun/header');
		$this->load->view('profesional/index', $data);
		$this->load->view('comun/footer');
	}

	public function insertar(){
		if($this->input->post()){
            $this->ProfesionalModel->insertar($this->input->post());
        	echo 'ok';
		}else{
			$this->load->view('comun/header');
			$this->load->view('profesional/insertar');
			$this->load->view('comun/footer');
		}
	}

	public function editar($id){
		if($this->input->post()){
            if($this->ProfesionalModel->actualizar($this->input->post(), $id)){
                echo 'ok';
            }else{
                echo '¡Ocurrió un error al actualizar sus datos, por favor intente de nuevo!';
            }
		}else{
            $data["profesional"] = $this->ProfesionalModel->Consultar($id);
            $data["id"] = $id;

			$this->load->view('comun/header');
			$this->load->view('profesional/editar', $data);
			$this->load->view('comun/footer');
		}
	}

	public function eliminar(){
		if($this->input->post()){
			$this->ProfesionalModel->Eliminar($this->input->post('id'));
			echo 'ok';
		}else{
			echo 'error';
		}
	}

	public function buscar(){
		if($this->input->post()){
			if($this->input->post('criterio')== "all")
				$data['ListaProfesionales'] 	=  $this->ProfesionalModel->Listar();
			else
				$data['ListaProfesionales'] 	= $this->ProfesionalModel->Buscar($this->input->post('criterio'));

			$this->load->view('profesional/tabla_profesional', $data);
		}
	}
}
