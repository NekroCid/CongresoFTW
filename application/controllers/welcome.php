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

//----------------------------------------Vistas para Agregar--------------------------------------------------------------------------

	public function evento()
	{
		$this->load->view('evento');
	}
	public function participante()
	{
		$talleres=$this->m_congreso->getTalleres();
		$datos['talleres']=$talleres;
		$this->load->view('participante',$datos);
	}
	public function instructor()
	{
		$this->load->view('instructor');
	}
	public function ponente()
	{
		$this->load->view('ponente');
	}
	function conferencia(){
		$ponentes=$this->m_congreso->getPonentes();
		$evento=$this->m_congreso->getUEvento();
		$datos['ponentes']=$ponentes;
		$datos['evento']=$evento[0];
		$this->load->view('conferencia',$datos);
	}
	function taller(){
		$instructores=$this->m_congreso->getInstructores();
		$evento=$this->m_congreso->getUEvento();
		$datos['instructores']=$instructores;
		$datos['evento']=$evento[0];
		$this->load->view('taller',$datos);
	}

//------------------------------------------------------Tablas-------------------------------------------------------------------------

	public function showPonente()
	{
		$ponentes = $this->m_congreso->getPonentes();
		$this->load->view('tabla_ponentes',array("datos"=>$ponentes) );

		//$info['datos']=$ponentes;
		//$this->Load->view('Tabla_ponentes',$info);
	}
	public function showInstructor()
	{
		$instructores = $this->m_congreso->getInstructores();
		$this->load->view('tabla_instructores',array("datos"=>$instructores) );
	}
	public function showTaller()
	{
		$contador = 0;
		$talleres = $this->m_congreso->getTalleres();
		foreach ($talleres as $key => $value) {
			$instructorA = $this->m_congreso->obtenerInstructor($value['instructor_idinstructor']);
			$instructores[$contador] = $instructorA[0]['nombre'];
			$eventoA = $this->m_congreso->obtenerEvento($value['evento_idevento']);
			$eventos[$contador] = $eventoA[0]['nombre'];
			$contador=$contador+1;
		}
		$this->load->view('tabla_talleres',array("datos"=>$talleres,"instructor"=>$instructores,"evento"=>$eventos) );
	}
	public function showConferencia()
	{
		$contador = 0;
		$conferencias = $this->m_congreso->getConferencias();
		foreach ($conferencias as $key => $value) {
			$ponenteA = $this->m_congreso->obtenerPonente($value['ponente_idponente']);
			$ponentes[$contador] = $ponenteA[0]['nombre'];
			$eventoA = $this->m_congreso->obtenerEvento($value['evento_idevento']);
			$eventos[$contador] = $eventoA[0]['nombre'];
			$contador=$contador+1;
		}
		//print_r($conferencias);
		//print_r($conferencias['eventos']);
		
		$this->load->view('tabla_conferencias',array("datos"=>$conferencias,"ponente"=>$ponentes,"evento"=>$eventos) );
	}

	function showRegistro(){
		$contador = 0;
		$registros = $this->m_congreso->getRegistros();
		foreach ($registros as $key => $value) {
			$participanteA = $this->m_congreso->obtenerParticipante($value['participante_idparticipante']);
			$participantes[$contador] = $participanteA[0]['nombre'];
			$eventoA = $this->m_congreso->obtenerEvento($value['evento_idevento']);
			$eventos[$contador] = $eventoA[0]['nombre'];
			$contador=$contador+1;
		}
		//print_r($participantes);
		$this->load->view('tabla_registro',array("registro"=>$registros, "participante"=>$participantes, "evento"=>$eventos) );
	}

	function showParticipante(){
		$contador = 0;
		$participantes = $this->m_congreso->getParticipantes();
		foreach ($participantes as $key => $value) {
			$tallerA = $this->m_congreso->obtenerTaller($value['taller_idtaller']);
			$talleres[$contador] = $tallerA[0]['nombre'];
			$contador=$contador+1;
		}
		$this->load->view('tabla_participantes',array("datos"=>$participantes, "taller"=>$talleres) );
	}
//-----------------------------------------------Funciones para dar de alta------------------------------------------------------------
	public function altaEvento()
	{
		$this->form_validation->set_message('required','El campo <b>%s</b> es requerido');
		$this->form_validation->set_rules('nom','Nombre','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('ponente');
		}
		else{
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
	public function altaParticipante()
	{
		$this->form_validation->set_message('required','El campo <b>%s</b> es requerido');
		$this->form_validation->set_message('valid_email','El <b>%s</b> es invaildo');

		$this->form_validation->set_rules('nom','Nombre','required');
		$this->form_validation->set_rules('rfc','RFC','required');
		$this->form_validation->set_rules('correo','E-Mail','required|valid_email');
		// $this->form_validation->set_rules('tel','Telefono','required');
		// $this->form_validation->set_rules('domi','Domicilio','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('participante');
		}
		else{

			$datos['nombre']=$this->input->post('nom');
			$datos['correo']=$this->input->post('correo');
			$datos['RFC']=$this->input->post('rfc');
			$datos['telefono']=$this->input->post('tel');
			$datos['domicilio']=$this->input->post('domi');
			$datos['taller_idtaller']=$this->input->post('taller');

			/*$evento=$this->m_congreso->getUEvento();
			$datos2['evento_idevento']=$evento[0]['idevento'];
			$part=$this->m_congreso->obtenerParticipante($this->input->post('rfc'));
			$datos2['participante_idparticipante']=$part[0]['idparticipante'];
			print_r($datos2['evento_idevento']);
			print_r($part);*/
			$this->m_congreso->agregarParticipante($datos);
			//$this->altaRegistro($datos2);

			$datos['mensaje']="Alta de Participante Exitosa";
			$datos['ruta']="index.php/welcome/participante";
			$this->load->view('mensaje',$datos);
		}
	}
	/*function altaRegistro($datos){
		$this->m_congreso->agregarRegistro($datos);
	}*/
	public function altaInstructor()
	{
		$this->form_validation->set_message('required','El campo <b>%s</b> es requerido');
		$this->form_validation->set_message('valid_email','El <b>%s</b> es invaildo');

		$this->form_validation->set_rules('nom','Nombre','required');
		$this->form_validation->set_rules('correo','E-Mail','required|valid_email');
		// $this->form_validation->set_rules('tel','Telefono','required');
		// $this->form_validation->set_rules('domi','Domicilio','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('instructor');
		}
		else{

			$datos['nombre']=$this->input->post('nom');
			$datos['correo']=$this->input->post('correo');
			$datos['telefono']=$this->input->post('tel');
			
			$this->m_congreso->agregarInstructor($datos);
			//$datos['mensaje']="Alta de Ponente Exitosa";
			//$datos['ruta']="index.php/welcome/ponente";
			//$this->load->view('mensaje',$datos);
			$this->showInstructor();
		}
	}
	public function altaConferencia()
	{
		$datos['nombre']=$this->input->post('nom');
		$datos['lugar']=$this->input->post('lugar');
		$datos['ponente_idponente']=$this->input->post('ponente');
		$datos['evento_idevento']=$this->input->post('idevento');
		$datos['fecha']=$this->input->post('fecha');
		$datos['hora']=$this->input->post('hora');
		// print_r($this->input->post('evento'));
		// print_r($this->input->post('idevento'));
		
		$this->m_congreso->agregarConferencia($datos);

		$datos['mensaje']="Alta de Conferecia Exitosa";
		$datos['ruta']="index.php/welcome/conferencia";
		$this->load->view('mensaje',$datos);
	}
	public function altaTaller()
	{
		$datos['nombre']=$this->input->post('nom');
		$datos['cupo']=$this->input->post('cupo');
		$datos['instructor_idinstructor']=$this->input->post('instructor');
		$datos['evento_idevento']=$this->input->post('idevento');
		$datos['fecha']=$this->input->post('fecha');
		$datos['hora']=$this->input->post('hora');
		// print_r($this->input->post('evento'));
		// print_r($this->input->post('idevento'));
		
		$this->m_congreso->agregarTaller($datos);

		$datos['mensaje']="Alta de Taller Exitosa";
		$datos['ruta']="index.php/welcome/taller";
		$this->load->view('mensaje',$datos);
	}

//-------------------------------------------------------Funciones de borrado----------------------------------------------------------
	public function borrarPonente($id){
		$this->m_congreso->borrarPonente($id);
		$this->showPonente();
	}
	public function borrarInstructor($id){
		$this->m_congreso->borrarInstructor($id);
		$this->showInstructor();
	}
	public function borrarTaller($id){
		$this->m_congreso->borrarTaller($id);
		$this->showTaller();
	}
	public function borrarConferencia($id){
		$this->m_congreso->borrarConferencia($id);
		$this->showConferencia();
	}

//-----------------------------------------------------Funciones de Modificacion-------------------------------------------------------
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

	public function editarInstructor($id){
		$datos_instructor = $this->m_congreso->obtenerInstructor($id);
		$datos['instructor'] = $datos_instructor[0];
		$this->load->view('editInstructor',$datos);
	}
	function actualizaInstructor(){
		$this->form_validation->set_message('required','El campo <b>%s</b> es requerido');
		$this->form_validation->set_message('valid_email','El <b>%s</b> es invaildo');

		$this->form_validation->set_rules('nom','Nombre','required');
		$this->form_validation->set_rules('correo','E-Mail','required|valid_email');
		// $this->form_validation->set_rules('tel','Telefono','required');
		// $this->form_validation->set_rules('domi','Domicilio','required');

		if($this->form_validation->run() == FALSE){
			$this->editarInstructor($this->input->post('id'));
		}
		else{
			$id=$this->input->post('id');
			$datos['nombre']=$this->input->post('nom');
			$datos['correo']=$this->input->post('correo');
			$datos['telefono']=$this->input->post('tel');
			
			$this->m_congreso->actInstructor($datos,$id);
			$this->showInstructor();
		}
	}

	public function editarConferencia($id){
		$datos_conferencia = $this->m_congreso->obtenerConferencia($id);
		$ponentes = $this->m_congreso->getPonentes();
		$evento = $this->m_congreso->getUEvento();
		$datos['ponentes']=$ponentes;
		$datos['evento']=$evento[0];
		$datos['conferencia'] = $datos_conferencia[0];
		$this->load->view('editConferencia',$datos);
	}
	function actualizaConferencia(){
		$id=$this->input->post('id');
		$datos['nombre']=$this->input->post('nom');
		$datos['lugar']=$this->input->post('lugar');
		$datos['ponente_idponente']=$this->input->post('ponente');
		$datos['evento_idevento']=$this->input->post('idevento');
		$datos['fecha']=$this->input->post('fecha');
		$datos['hora']=$this->input->post('hora');
		$this->m_congreso->actConferencia($datos,$id);
		$this->showConferencia();
	}

	public function editarTaller($id){
		$datos_taller = $this->m_congreso->obtenerTaller($id);
		$instructores = $this->m_congreso->getInstructores();
		$evento = $this->m_congreso->getUEvento();
		$datos['instructores']=$instructores;
		$datos['evento']=$evento[0];
		$datos['taller'] = $datos_taller[0];
		$this->load->view('editTaller',$datos);
	}
	function actualizaTaller(){
		$id=$this->input->post('id');
		$datos['nombre']=$this->input->post('nom');
		$datos['cupo']=$this->input->post('cupo');
		$datos['instructor_idinstructor']=$this->input->post('instructor');
		$datos['evento_idevento']=$this->input->post('idevento');
		$datos['fecha']=$this->input->post('fecha');
		$datos['hora']=$this->input->post('hora');
		$this->m_congreso->actTaller($datos,$id);
		$this->showTaller();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */