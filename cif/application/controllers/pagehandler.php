<?php

function parseCurlyBrace($str) {

  $length = strlen($str);
  $stack  = array();
  $result = array();

  for($i=0; $i < $length; $i++) {

     if($str[$i] == '{') {
        $stack[] = $i;
     }

     if($str[$i] == '}') {
        $open = array_pop($stack);
        $result[] = substr($str,$open+1, $i-$open-1);
     }
  }

  return $result;
}


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PageHandler extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page/PageModel', 'PageModel', TRUE);
        $this->load->library('parser');
        $this->load->library('PageBuilder', '', 'PB');
        $this->load->helper('url');
    }
    
    public function index()
    {
        
        $uri = $this->uri->slash_segment(1, 'leading');
        
        $ret = $this->PageModel->getPage($uri);
        if(isset($ret->id))
        {
            $data = array();
            $rsrc = $this->PB->LoadResources($ret->id);
            $data = array_merge($rsrc);
            
            $data['Main'] = 'Main has no content';
            $mainContent = $this->PageModel->getCustomPanelContent($ret->id, 'main');
            if($mainContent) $data['Main'] = $mainContent;

            //get the panels
            
           $a = APPPATH . 'controllers/panels/'.'leftCategory'. '.php';
           include_once $a;
           $a = new LeftCategory();
          
         // dump($a->index());
                //load main page content
            dump($a->index());
            //parseCurlyBrace
            
            $this->PB->RenderHeader($data);
            echo $this->parser->parse_string($ret->layout, $data, TRUE);
            $this->PB->RenderFooter();
        }
        else
        {
            show_404();
        }
    }

}