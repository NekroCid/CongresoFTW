<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_congreso extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function agregarEvento($datos){
		$this->db->insert('evento',$datos);
	}
	function agregarPonente($datos){
		$this->db->insert('ponente',$datos);
	}
}
