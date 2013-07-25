<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Why extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['view_page'] = 'why';
		$this->load->view('template', $data);
	}
}
?>