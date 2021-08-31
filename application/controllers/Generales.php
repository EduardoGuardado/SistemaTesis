<?php if ( ! defined('BASEPATH')) exit('No está permitido el acceso directamente.');

class Generales extends CI_Controller{	
    public function buscar($tabla,$campo,$texto,$dest,$dest1,$dest2,$ifra,$orden,$id){
		$texto = rawurldecode($texto);
		$this->load->model('general');
		$datos['dest']=$dest;
		$datos['dest1']=$dest1;
		$datos['dest2']=$dest2;
		$datos['ifra']=$ifra;
		$datos['busq']=$this->general->buscar($tabla,$campo,$texto,$orden,$id);
		$this->load->view('grupoFCJ/selector',$datos);
    }
}