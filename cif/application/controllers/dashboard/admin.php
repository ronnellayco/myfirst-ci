<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mainAdmin', 'mainAdmin', TRUE);
        $this->load->library('parser');
        $this->load->library('session');
//        $this->load->library('PageBuilder', '', 'PB');
        
        
        
        //include this in all admin
        //$this->session->userdata('admin')
        $this->load->library('AdminHandler');
    }

    public function login()
    {
        //check if session is set then redirect to dashboard
        $ses = $this->session->userdata('admin');
        if($ses['id'] > 0 && $ses['admin'] == true)
        {
            header('Location: /dashboard/home');
            exit;
        }
        
        //begin login page
        
        $data = array();
        $data['username'] = '';
        $data['password'] = '';
        $data['error'] = ''; 
         
        if(isset($_POST['submit']))
        {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['error'] = $this->user_handler($data['username'], $data['password']);
        }
     
        $this->parser->parse('admin/login_page', $data);
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        header('Location: /uadmin');
        exit;
    }
    
    private function user_handler($username, $password)
    {
        $error = 'Invalid username and/or password combination.';
        
        $ret = $this->mainAdmin->login($username, $password);
        if(isset($ret->id))
        {
            //set the session
            //redirect to admin home page
            $data['admin'] = array('id' => $ret->id,
                                   'admin' => true
                                   );

            $this->session->set_userdata($data);
            header('Location: /dashboard/home');
            exit;
        }
        
        return $error;
    }

}