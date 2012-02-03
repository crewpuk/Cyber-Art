<?php
class Index extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('cyber_model');
		$this->load->helper("form");
        $this->load->library('session');
	}
	function index(){
		$this->login();
	}
	function login(){
		echo form_open('admin/index/cek');
		echo('<input type="text" name="username" />');
		echo('<input type="password" name="password" />');
		echo('<input type="submit" name="login" value="Login" />');
		echo form_close();
	}
	function logout(){
        $this->session->sess_destroy();
        redirect("admin/index/login");
	}
	function cek(){
		$a=$this->cyber_model->login($_POST['username'],$_POST['password']);
		$id = $a['id'];
		if($a){
            redirect('admin/index/admin');
		}else{
			redirect('admin/index/login');
		}
		
	}
	function admin(){
        if(isset($this->session->userdata['id_user'])){
            echo "Halaman Administrator";
            echo anchor(base_url('admin/index/logout'),'logout');
        }
        else{
            redirect('admin/index/login');
        }
	}
}