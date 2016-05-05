<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller {

    public function __construct()   {
        parent::__construct();
        $this->load->model('Recorder');
        $this->load->helper('url_helper');
    }

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
    public function index() {
        $metadata = new page_metadata(
            'Explorer',
            'Find your way home, or manage corp'."'".'s waypoint',
            'utf-8',
            'Exploring...',
            ['/wormholeexplorer/css/style.css', '/wormholeexplorer/css/cistyle.css'],
            ['/wormholeexplorer/js/wormholeexplorer.js', '/wormholeexplorer/js/list_drawer.js']);
        $this->load->view('templates/header', $metadata->value());
        $this->load->view('view');
        $this->load->view('templates/footer');
    }
    public function recorder($p1, $p2) {
        switch ($this->input->method()) {
            case 'get':
                # code...
                break;
            case 'post':
                break;
            case 'delete':
                break;
            default:
                $this->output->set_status_header(405);
                break;
        }($this->input->method())
        return json_encode();
    }
}
