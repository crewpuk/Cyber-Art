<?php
class Cyber_control extends CI_Controller{
	
	function __Construct(){
		parent::__Construct();	
		$this->load->model('cyber_model');
		$this->load->helper('html');
		$this->load->helper('date');
	}
	
	function index(){
		$data['css'] = link_tag('style/style.css');
		$data['css'] .= link_tag('style/layout.css');
		$data['css'] .= link_tag('style/class.css');
        
        /*
         * Link_tag for jquery
         */
        $data['jquery_link'] = link_tag('js/jquery.js','','text/javascript');
        $data['jquery_link'] .= link_tag('js/jquery_tools.js','','text/javascript');
        $data['jquery_link'] .= link_tag('js/jquery_assets.js','','text/javascript');
        // Adding jquery_link to css
        $data['css'] .= $data['jquery_link'];
        /*
         * End of link_tag for jquery
         */
        
		$data['art'] = $this->cyber_model->get_all_data('m_posting');
		$this->load->view('main',$data);		
	}
}
?>