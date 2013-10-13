<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PageBuilder', '', 'PB');
        $this->load->model('page/PageModel', 'PageModel', TRUE);
    }
    
    public function index($data = array())
    {
        //pag controller ito load the page builder layout
        //kung controller ito, dapat ilagay pa din dun sa rl_pages na table
        //para ma load ang resources etc..
        //
        
        //dump($_GET);
        
        $url = $this->uri->slash_segment(1,'leading');
        $this->PB->ControllerPageBuilder($url);
        

        
        
        return 'test';
    }
    
    public function view($data = array())
    {
        dump($data);
    }
            

}