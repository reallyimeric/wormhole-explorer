<?php
/**
 * blablabla
 *              //so what are these comments used for?
 * @package	CodeIgniter
 * @author	Me
 * @copyright	blablabla
 * @license	blablabla
 * @link	https://blablabla
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');     //maybe deny direct access.

/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Me
 * @link		https://blablabla
 */

// ------------------------------------------------------------------------

class page_metadata {
    public function __construct($title='',$description='',$charset='utf-8',$page_header='',$css=[],$js=[]) {
        $this->title = $title;
        $this->description = $description;
        $this->charset = $charset;
        $this->page_header = $page_header;
        $this->css = $css;
        $this->js = $js;
    }
    private $title;
    private $description;
    private $charset;
    private $page_header;
    private $css;
    private $js;
    public function value() {
        $data = [
            'title'         =>  $this->title,
            'description'   =>  $this->description,
            'charset'       =>  $this->charset,
            'page_header'   =>  $this->page_header,
            'css'           =>  $this->css,
            'js'            =>  $this->js ];
        return $data;
    }
}
