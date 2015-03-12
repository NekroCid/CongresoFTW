<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('m_congreso');
	}
	public function index()
	{
		$this->load->view('inicio');
	}
	public function evento()
	{
		$this->load->view('evento');
	}
	public function conferencia()
	{
		$this->load->view('conferencia');
	}
	public function taller()
	{
		$this->load->view('taller');
	}
	public function participante()
	{
		$this->load->view('participante');
	}
	public function instructor()
	{
		$this->load->view('instructor');
	}
	public function ponente()
	{
		$this->load->view('ponente');
	}
	public function altaEvento()
	{
		$datos['nombre']=$this->input->post('nom');
		$datos['fecha']=$this->input->post('fecha');
		$datos['lugar']=$this->input->post('lugar');
		$datos['hora']=$this->input->post('hora');
		$datos['costo']=$this->input->post('costo');
		
		$this->m_congreso->agregarEvento($datos);
		$datos['mensaje']="Alta de Evento Exitosa";
		$datos['ruta']="index.php/welcome/evento";
		$this->load->view('mensaje',$datos);
	}
	public function altaPonente()
	{
		$this->form_validation->set_message('required','El campo <b>%s</b> es requerido');
		$this->form_validation->set_message('valid_email','El <b>%s</b> es invaildo');

		$this->form_validation->set_rules('nom','Nombre','required');
		$this->form_validation->set_rules('correo','E-Mail','required|valid_email');
		// $this->form_validation->set_rules('tel','Telefono','required');
		// $this->form_validation->set_rules('domi','Domicilio','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('ponente');
		}
		else{

			$datos['nombre']=$this->input->post('nom');
			$datos['correo']=$this->input->post('correo');
			$datos['telefono']=$this->input->post('tel');
			$datos['domicilio']=$this->input->post('domi');
			
			$this->m_congreso->agregarPonente($datos);
			$datos['mensaje']="Alta de Ponente Exitosa";
			$datos['ruta']="index.php/welcome/ponente";
			$this->load->view('mensaje',$datos);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */