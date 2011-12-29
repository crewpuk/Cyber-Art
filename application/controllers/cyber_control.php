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
		$data['art'] = $this->cyber_model->get_all_data('m_posting',0,3);
		$data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
		$this->load->view('main',$data);		
	}
}
?>