<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
//        if(!isset($_SESSION['admin']))
//        {
//            $this->invalidlogin();
//            exit;
//        }
//        else $this->index();
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