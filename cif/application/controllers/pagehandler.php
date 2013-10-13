<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PageHandler extends CI_Controller
{

    public function index()
    {
        dump($this->uri->uri_string);
        //$this->load->view('welcome_message');
    }

}