<?php
class Cyber_control extends CI_Controller{
	
	function __Construct(){
		parent::__Construct();	
		$this->load->model('cyber_model');
		$this->load->helper('html');
		$this->load->helper('date');
	}
	
	function index(){
		//Memanggil File CSS
		$data['css'] = link_tag('style/style.css');
		$data['css'] .= link_tag('style/layout.css');
		$data['css'] .= link_tag('style/class.css');
		//Navigation 1 Artikel
		$data['art'] = $this->cyber_model->get_order('id','DESC','m_posting',0,3);
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
		$data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
		

        
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
        
		$this->load->view('main',$data);		
	}
}
?>