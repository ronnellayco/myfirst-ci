<?php

class AdminHandler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        
        if($this->session->userdata('admin'))
        {
            //dump('exist');
        }
        else
        {
            $data['admin'] = array('id' => 0,
                                   'admin' => false
                                   );

            $this->session->set_userdata($data);
        }
        

    }
}

?>