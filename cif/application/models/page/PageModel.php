<?php

class PageModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getHomepage()
    {
        $this->db->where('url', '/');
        $query = $this->db->get('rl_pages');
        return $query->row();
    }
    
    public function getPage($pagepath)
    {
        $this->db->where('url', $pagepath);
        $query = $this->db->get('rl_pages');
        return $query->row();
    }
    
    public function getPageResources($page_id)
    {
        $this->db->where('page_id', $page_id);
        $query = $this->db->get('rl_pages_rsc');
        return $query->result_array();
    }
    
    public function getCustomPanelContent($page_id, $type)
    {
        $this->db->select('content');
        $this->db->where('page_id', $page_id);
        $this->db->where('type', $type);
        $query = $this->db->get('rl_pages_custom_panels');
        
        if($query->row())
        {
            return $query->row()->content;
        }
        else return false;
    }
}

?>
