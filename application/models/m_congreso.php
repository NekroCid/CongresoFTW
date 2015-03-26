<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_congreso extends CI_Model {
	function __construct(){
		parent::__construct();
	}

//----------------------------------------------------------------Funciones de Agregado-------------------------------------------------------
	function agregarEvento($datos){
		$this->db->insert('evento',$datos);
	}
	function agregarConferencia($datos){
		$this->db->insert('conferencia',$datos);
	}
	function agregarPonente($datos){
		$this->db->insert('ponente',$datos);
	}
	function agregarInstructor($datos){
		$this->db->insert('instructor',$datos);
	}
	function agregarTaller($datos){
		$this->db->insert('taller',$datos);
	}
	function agregarParticipante($datos){
		$this->db->insert('participante',$datos);
	}

//-------------------------------------------------------Funciones para obtener toda la tabla-------------------------------------------------

	function getPonentes(){
		$query=$this->db->get('ponente');
		return $query->result_array();
	}
	function getInstructores(){
		$query=$this->db->get('instructor');
		return $query->result_array();
	}
	function getTalleres(){
		$query=$this->db->get('taller');
		return $query->result_array();
	}
	function getConferencias(){
		$query=$this->db->get('conferencia');
		return $query->result_array();
	}

//------------------------------------------------------Funciones para obtener un solo registro-----------------------------------------------

	function obtenerPonente($id){
		$this->db->where('idponente',$id);
		$query = $this->db->get('ponente');
		return $query->result_array();
	}
	function obtenerInstructor($id){
		$this->db->where('idinstructor',$id);
		$query = $this->db->get('instructor');
		return $query->result_array();
	}
	function obtenerConferencia($id){
		$this->db->where('idconferencia',$id);
		$query = $this->db->get('conferencia');
		return $query->result_array();
	}
	function obtenerEvento($id){
		$this->db->where('idevento',$id);
		$query = $this->db->get('evento');
		return $query->result_array();
	}
	function getUEvento(){
		$this->db->order_by('idevento','desc');
		$this->db->limit(1);
		$query=$this->db->get('evento');

		return $query->result_array();
	}

//-------------------------------------------------------------Funciones de borrado-----------------------------------------------------------

	function borrarPonente($id){
		$this->db->where('idponente',$id);
		$this->db->delete('ponente');
	}
	function borrarInstructor($id){
		$this->db->where('idinstructor',$id);
		$this->db->delete('instructor');
	}
	function borrarTaller($id){
		$this->db->where('idtaller',$id);
		$this->db->delete('taller');
	}

//-------------------------------------------------------------Funciones de modificaciones----------------------------------------------------

	function actPonente($datos,$id){
		$this->db->where('idponente',$id);
		$this->db->update('ponente',$datos);
	}
	function actInstructor($datos,$id){
		$this->db->where('idinstructor',$id);
		$this->db->update('instructor',$datos);
	}
	function actConferencia($datos,$id){
		$this->db->where('idconferencia',$id);
		$this->db->update('conferencia',$datos);
	}
}
