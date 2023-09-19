<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
		$data['page'] = 'dashboard_view';
		$this->load->view('tamplate', $data);
		//$this->load->view('dashboard_view');
	}
}
