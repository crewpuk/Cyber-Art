<?php
class Index extends CI_Controller{
	function __construct(){
		parent::__construct();
<<<<<<< HEAD
		$this->load->model(array('cyber_model'));
		$this->load->helper(array("form"));
        $this->load->library(array('session','admin_panel'));
=======
		$this->load->model('cyber_model');
		$this->load->helper("form");
        $this->load->library('session');
>>>>>>> 1305436cc1e2f10ffd3b878495257a1bc4444ca5
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
	function admin($page="home"){
        if(isset($this->session->userdata['id_user'])){
			if($page=="home"){
				$PAGE = $this->admin_panel->tbl_input_posting();
			}
			elseif($page=="admin"){
				$PAGE =  $this->admin_panel->tbl_input_admin();
			}
            echo '<table width="374" height="204" border="0" cellpadding="3" cellspacing="3">
				  <tr>
					<td width="152" height="23">
					<a href="'.base_url().'admin/index/admin/home">Master Posting</a></td>
					<td width="206" rowspan="8" valign="top">'.$PAGE.'</td>
				  </tr>
				  <tr>
					<td height="23">
					<a href="'.base_url().'admin/index/admin/admin">Master Administrator</a></td>
				  </tr>
				  <tr>
					<td height="23">Master Download</td>
				  </tr>
				  <tr>
					<td height="23">Master Galery</td>
				  </tr>
				  <tr>
					<td height="23">Master Testimoni</td>
				  </tr>
				  <tr>
					<td height="23">Master Agenda</td>
				  </tr>
				  <tr>
					<td height="23">Master Shoutbox</td>
				  </tr>
				  <tr>
					<td height="23">Master Komentar</td>
				  </tr>
				</table>';
            echo anchor(base_url('admin/index/logout'),'logout');
        }
        else{
            redirect('admin/index/login');
        }
	}
}