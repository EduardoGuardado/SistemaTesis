<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoFCJControlador extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model("GrupoFCJModel");
    }

    public function index()
	{
		$data['ListaGruposFCJ']	= $this->GrupoFCJModel->Listar();
		$this->load->view('comun/header');
		$this->load->view('grupoFCJ/index', $data);
		$this->load->view('comun/footer');
	}

	public function insertar(){
			$this->load->view('comun/header');
			$this->load->view('grupoFCJ/insertar');
			$this->load->view('comun/footer');
	}
	public function guardar(){
		if($this->GrupoFCJModel->insertar($this->input->post())){
			echo 'ok';
		}else{
			echo '¡Ocurrió un error al guardar sus datos, por favor intente de nuevo!';
		}
	}

	public function editar($id){
		if($this->input->post()){
            if($this->GrupoFCJModel->actualizar($this->input->post(), $id)){
                echo 'ok';
            }else{
                echo '¡Ocurrió un error al actualizar sus datos, por favor intente de nuevo!';
            }
		}else{
            $data["grupofcj"] = $this->GrupoFCJModel->Consultar($id);
            $data["id"] = $id;

			$this->load->view('comun/header');
			$this->load->view('grupoFCJ/editar', $data);
			$this->load->view('comun/footer');
		}
	}

	public function eliminar(){
		if($this->input->post()){
			$this->GrupoFCJModel->Eliminar($this->input->post('id'));
			echo 'ok';
		}else{
			echo 'error';
		}
	}

	public function buscar(){
		if($this->input->post()){
			if($this->input->post('criterio')== "all")
				$data['ListaGruposFCJ'] 	=  $this->GrupoFCJModel->Listar();
			else
				$data['ListaGruposFCJ'] 	= $this->GrupoFCJModel->Buscar($this->input->post('criterio'));

			$this->load->view('grupoFCJ/tabla_grupofcj', $data);
		}
	}
}
