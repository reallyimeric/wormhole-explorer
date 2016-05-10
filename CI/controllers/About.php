<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('page_metadata');
        $title = 'About';
        $metadata = new page_metadata(
            $title,
            'Hi, google! This is an about page. My title is "'.$title.'".',
            'utf-8',
            'About',
            ['/wormholeexplorer/css/cistyle.css']
		);      //i should do this in my helper and use base_url() from url helper
        $this->load->view('templates/header', $metadata->value());
		$this->load->view('about');
		$this->load->view('templates/footer');
	}
}
