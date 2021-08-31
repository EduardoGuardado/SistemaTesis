<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProfesionalModel extends CI_Model{
    private $nombreTabla = "profesional";
    private $idTabla = "idpro";

	public function insertar($datos)
	{
		if($this->db->insert($this->nombreTabla, $datos)){
            return $this->db->insert_id();
        }
		return false;
	}
	
	public function actualizar($datos,$id){
		$this->db->where($this->idTabla, $id);
		if($this->db->update($this->nombreTabla, $datos))
		    return true;
		else
		    return $this->db->error;
	}
	
	public function Listar(){
		$this->db->from('profesional');
		return $this->db->get()->result();
	}

	public function Eliminar($id){
		$this->db->delete($this->nombreTabla, array($this->idTabla => $id)); 
	}

	public function Consultar($id){
		return $this->db->get_where($this->nombreTabla, array($this->idTabla => $id))->row();
	}

	public function Buscar($criterio){
		$this->db->from($this->nombreTabla);
        $this->db->like("tituloob", $criterio);
        $this->db->or_like("nombre", $criterio);
		return $this->db->get()->result();
	}
}