<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageBuilder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page/PageModel', 'PageModel', TRUE);
    }
    
    public function LoadResources($page_id)
    {
        $data = array();
        $data['css'] = array();
        $data['js'] = array();

        //load resources css /js
        $rsrc = $this->PageModel->getPageResources($page_id);
        foreach ($rsrc as $key => $ret_rsrc)
        {
            if ($ret_rsrc['type'] == 'css')
            {
                $data['css'][] = $ret_rsrc['source'];
            }

            if ($ret_rsrc['type'] == 'js')
            {
                $data['js'][] = $ret_rsrc['source'];
            }
        }
        
        
        
        //load main file
        
        
        
        return $data;
    }
    
    public function RenderHeader($data = array())
    {
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">'. "\n";
        echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' . "\n";
        echo '<head>' . "\n";
        echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />'. "\n";
        
        //load css and js
        if (isset($data['css']))
        {
            foreach ($data['css'] as $key => $value)
            {
                echo '<link rel="stylesheet" type="text/css" href="/css/' . $value . '">' . "\n ";
            }
        }
        
        if (isset($data['js']))
        {
            foreach ($data['js'] as $key => $value)
            {
                echo '<link rel="stylesheet" type="text/css" href="/css/' . $value . '">' . "\n ";
            }
        }

        echo "</head>\n";
        echo "<body>\n";
        
    }
    
    public function RenderFooter()
    {
        echo "\n</body>\n";
        echo "</html>";
    }
    
    public function ControllerPageBuilder($url)
    {
         $ret = $this->PageModel->getPage($url);
         dump($ret);
    }
}

?>