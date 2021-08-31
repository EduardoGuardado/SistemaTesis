<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directamente.');
class General extends CI_Model{
    function __construct(){
       $this->load->database();
    }
	public function buscar($tabla,$campo,$texto,$orden='nombre ASC',$id='codigo'){
		$sql ="SELECT ".$id." as codigo,".$campo." as nombre";
		$sql.=" FROM ".$tabla." WHERE ".$campo." LIKE '%".$texto."%'";
		$sql.=" ORDER BY ".$orden;
		$consulta=$this->db->query($sql);
		return $consulta->result();
	}
}