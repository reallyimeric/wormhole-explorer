<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller {

    public function __construct()   {
        parent::__construct();
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
    public function index($p1=null, $p2=null){
        if ($p1 === null) self::viewpage($this);
        else self::processrequest($this, $p1, $p2);
    }
    static private function viewpage($that){
        $metadata = new page_metadata(
            'Explorer',
            'Find your way home, or manage corp'."'".'s waypoint',
            'utf-8',
            'Exploring...',
            ['/wormholeexplorer/css/style.css', '/wormholeexplorer/css/cistyle.css'],
            ['/wormholeexplorer/js/frontend.js', '/wormholeexplorer/js/list_drawer.js']);
        $that->load->view('templates/header', $metadata->value());
        $that->load->view('view');
        $that->load->view('templates/footer');
    }
    static private function processrequest($that, $p1, $p2){
        $that->load->model('Recorder');
        switch ($that->input->method(true)) {
            case 'GET':
                $returned = $that->Recorder->getrecord($p1, $p2);
                if ($returned < 0) self::errorhandler($that, $returned);
                else {
                    $that->output->set_content_type('application/json');
                    echo $returned;
                }
                break;
            case 'POST':
                $returned = $that->Recorder->postrecord($p1, $p2);
                if ($returned < 0) self::errorhandler($that, $returned);
                else {
                    $that->output->set_content_type('application/json');
                    echo $returned;
                }
                break;
            case 'DELETE':
                $returned = $that->Recorder->deleterecord($p1, $p2);
                if ($returned < 0) self::errorhandler($that, $returned);
                else {
                    $that->output->set_content_type('application/json');
                    echo $returned;
                }
                break;
            default:
                $that->output->set_status_header(405);
                break;
        }
    }
    static private function errorhandler($that, $returned){
        $that->output->set_status_header(403);
        switch ($returned) {
            case '-1':
                echo "query method not allowed";
                break;
            case '-2':
                echo "illegal parameter";
                break;
            default:
                echo "blablabla, whatever, i don't know";
                break;
        }
    }
}
