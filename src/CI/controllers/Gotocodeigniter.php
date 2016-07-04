<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gotocodeigniter extends CI_Controller {
	public function index()
	{
                $this->load->helper('url');
		redirect('https://www.codeigniter.com/user_guide/');
	}
}
