<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ModelGeneral');
	}
	public function index()
	{

		$this->SaveInfoForm();

		
	}
	 //funcion de  conexion para  la  bd 
	 public  function SaveInfoForm(){
				$ValName = $this->input->post('nombre');
				$ValEmail = $this->input->post('email');
				$ValPhone = $this->input->post('phone');
	
				$send    = $this->ModelGeneral->ValidateSaveInfo($ValName,$ValEmail,$ValPhone);
				echo json_encode(['status' => TRUE, 'info' => $send]);
			
		

	 }
}
