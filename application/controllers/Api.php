<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_api');
		
		$this->load->helper('custom_func');
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		header('Access-Control-Allow-Origin: *');  
		header('Content-Type: application/json');
		
	}

	public function app()
	{
		$data = $this->m_api->app();
		echo json_encode($data);
	}

	public function log_user()
	{
		$data = $this->m_api->log_user();
		echo json_encode($data);
	}

	public function user()
	{
		$data = $this->m_api->user();
		echo json_encode($data);
	}


	public function pasien()
	{
		$data = $this->m_api->pasien();
		echo json_encode($data);
	}
	public function diagnosa_terbanyak()
	{
		$data = $this->m_api->diagnosa_terbanyak();
		echo json_encode($data);
	}


}
