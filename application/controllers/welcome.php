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
	public function showPonente()
	{
		$ponentes = $this->m_congreso->getPonente();
		$this->load->view('tabla_ponentes',array("datos"=>$ponentes) );

		//$info['datos']=$ponentes;
		//$this->Load->view('Tabla_ponentes',$info);
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
			//$datos['mensaje']="Alta de Ponente Exitosa";
			//$datos['ruta']="index.php/welcome/ponente";
			//$this->load->view('mensaje',$datos);
			$this->showPonente();
		}
	}
	public function borrarPonente($id){
		$this->m_congreso->borrarPonente($id);
		$this->showPonente();
	}
	public function editarPonente($id){
		$datos_ponente = $this->m_congreso->obtenerPonente($id);
		$datos['ponente'] = $datos_ponente[0];
		$this->load->view('editPonente',$datos);
	}
	function actualizaPonente(){
		$this->form_validation->set_message('required','El campo <b>%s</b> es requerido');
		$this->form_validation->set_message('valid_email','El <b>%s</b> es invaildo');

		$this->form_validation->set_rules('nom','Nombre','required');
		$this->form_validation->set_rules('correo','E-Mail','required|valid_email');
		// $this->form_validation->set_rules('tel','Telefono','required');
		// $this->form_validation->set_rules('domi','Domicilio','required');

		if($this->form_validation->run() == FALSE){
			$this->editarPonente($this->input->post('id'));
		}
		else{
			$id=$this->input->post('id');
			$datos['nombre']=$this->input->post('nom');
			$datos['correo']=$this->input->post('correo');
			$datos['telefono']=$this->input->post('tel');
			$datos['domicilio']=$this->input->post('domi');
			
			$this->m_congreso->actPonente($datos,$id);
			$this->showPonente();
		}
	}
	function conferencia(){
		$ponentes=$this->m_congreso->getPonente();
		$evento=$this->m_congreso->getUEvento();
		$datos['ponentes']=$ponentes;
		$datos['evento']=$evento[0];
		$this->load->view('conferencia',$datos);
	}
	public function altaConferencia()
	{

		$datos['nombre']=$this->input->post('nom');
		$datos['lugar']=$this->input->post('lugar');
		$datos['ponente_idponente']=$this->input->post('ponente');
		$datos['evento_idevento']=$this->input->post('idevento');
		$datos['fecha']=$this->input->post('fecha');
		$datos['hora']=$this->input->post('hora');
		
		$this->m_congreso->agregarConferencia($datos);
		$datos['mensaje']="Alta de conferecia Exitosa";
		$datos['ruta']="index.php/welcome/conferencia";
		$this->load->view('mensaje',$datos);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */