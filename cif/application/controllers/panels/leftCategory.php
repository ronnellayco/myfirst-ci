<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LeftCategory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->model('page/PageModel', 'PageModel', TRUE);
//        $this->load->library('parser');
//        $this->load->library('PageBuilder', '', 'PB');
    }
    
    public function index()
    {
         return 'can return string or array of data';
    }
    
    

}