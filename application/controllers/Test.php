<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
	public function index()
	{
		$this->load->view('Testview');
	}


}