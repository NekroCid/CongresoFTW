<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_congreso extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function agregarEvento($datos){
		$this->db->insert('evento',$datos);
	}
	function agregarConferencia($datos){
		$this->db->insert('conferencia',$datos);
	}
	function agregarPonente($datos){
		$this->db->insert('ponente',$datos);
	}
	function getPonente(){
		$query=$this->db->get('ponente');
		return $query->result_array();
	}
	function obtenerPonente($id){
		$this->db->where('idponente',$id);
		$query = $this->db->get('ponente');
		return $query->result_array();
	}
	function borrarPonente($id){
		$this->db->where('idponente',$id);
		$this->db->delete('ponente');
	}
	function actPonente($datos,$id){
		$this->db->where('idponente',$id);
		$this->db->update('ponente',$datos);
	}
	function getUEvento(){
		$this->db->order_by('idevento','desc');
		$this->db->limit(1);
		$query=$this->db->get('evento');

		return $query->result_array();
	}
}
