<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page/PageModel', 'PageModel', TRUE);
        $this->load->library('parser');
        $this->load->library('PageBuilder', '', 'PB');
    }
    
    public function index()
    {
        $ret = $this->PageModel->getHomepage();
        if(isset($ret->id))
        {
            $data = array();
            $rsrc = $this->PB->LoadResources($ret->id);
            $data = array_merge($rsrc);
            
            $data['Main'] = 'Main has no content';
            $mainContent = $this->PageModel->getCustomPanelContent($ret->id, 'main');
            if($mainContent) $data['Main'] = $mainContent;


                //load main page content
            
            
            $this->PB->RenderHeader($data);
            echo $this->parser->parse_string($ret->layout, $data, TRUE);
            $this->PB->RenderFooter();
        }
        else
        {
            echo 'Homepage not defined';
        }
    }

}