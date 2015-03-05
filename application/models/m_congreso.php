<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_congreso extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function agregaCongreso($datos){
		$this->db->insert('eventos',$datos);
	}
}
