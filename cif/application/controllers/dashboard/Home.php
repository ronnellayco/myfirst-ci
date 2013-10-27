<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('AdminHandler');
        
        $ses = $this->session->userdata('admin');
        if($ses['id'] <= 0 || $ses['admin'] == false)
        {
            header('Location: /uadmin');
            exit;
        }
    }
    
    public function invalidlogin()
    {
        echo 'Access denied';
    }

    public function index()
    {
        echo 'im inside dashboard';
    }
    
    public function test()
    {
        echo 'testdashboard';
    }

}