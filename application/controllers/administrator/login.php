<?php if( ! defined("BASEPATH")) exit("No direct script access allowed");
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('cyber_model'));
		$this->load->helper(array('form','css','html'));
        $this->load->library(array('table','session','admin_panel'));
	}
	function index(){
		$data4view['page_title'] = "Login";
		$data4view['head_attrib'] = $this->admin_panel->get_head_attrib();
		$data4view['content'] = form_open('administrator/login/checking');
		$data4view['content'] .= ('<table cellpadding="5" cellspacing="0" align="center" style="border:solid 1px #555;"><tr><td>Username <input type="text" name="username" /></td></tr>');
		$data4view['content'] .= ('<tr><td>Password <input type="password" name="password" /></td></tr>');
		$data4view['content'] .= ('<tr><td align="center"><input type="submit" name="login" value="Login" /> <input type="button" value="Kembali" onclick="javascript:location=\''.base_url().'\'"></td></tr>');
		$data4view['content'] .= form_close();
		$this->load->view("admin",$data4view);
	}
	function checking(){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$a=$this->cyber_model->login($username,$password);
		$id = $a['id'];
		if($a){
            redirect(base_url().'administrator/dashboard');
		}else{
			redirect(base_url().'administrator/login');
		}
		
	}
}