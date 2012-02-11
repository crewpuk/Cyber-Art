<?php
class Index extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('cyber_model'));
		$this->load->helper(array('form','css','html'));
        $this->load->library(array('table','session','admin_panel'));
	}
	function index(){
		$this->login();
	}
	function login(){
		echo "<title>Cyber-Art | Login</title>";
		echo link_tag("style/admin.css");
		echo link_tag("style/layout.css");
		echo link_tag("style/class.css");
		echo form_open('admin/index/cek');
		echo('<table cellpadding="5" cellspacing="0" align="center" style="border:solid 1px #555;"><tr><td>Username <input type="text" name="username" /></td></tr>');
		echo('<tr><td>Password <input type="password" name="password" /></td></tr>');
		echo('<tr><td align="center"><input type="submit" name="login" value="Login" /> <input type="button" value="Kembali" onclick="javascript:location=\''.base_url().'\'"></td></tr>');
		echo form_close();
	}
	function logout(){
        $this->session->sess_destroy();
        redirect("admin/index/login");
	}
	function cek(){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$a=$this->cyber_model->login($username,$password);
		$id = $a['id'];
		if($a){
            redirect('admin/index/admin');
		}else{
			redirect('admin/index/login');
		}
		
	}
	function admin($page="home"){
		echo "<title>Cyber-Art | Admin</title>";
		echo link_tag("style/admin.css");
		echo link_tag("style/layout.css");
		echo link_tag("style/class.css");
        if(isset($this->session->userdata['id_user'])){
			if($page=="home"){
				$PAGE = $this->admin_panel->tbl_input_posting();
			}
			elseif($page=="admin"){
				$PAGE =  $this->admin_panel->tbl_input_admin();
			}
			elseif($page=="donlod"){
				$PAGE =  $this->admin_panel->tbl_input_download();
			}
			elseif($page=="galery"){
				$PAGE = $this->admin_panel->tbl_input_galery();
			}
			elseif($page=="testi"){
				$PAGE = $this->admin_panel->tbl_input_testimoni();	
			}
			elseif($page=="agenda"){
				$PAGE = $this->admin_panel->tbl_input_agenda();	
			}
			elseif($page=="shout"){
				$PAGE = $this->admin_panel->tbl_input_shout();	
			}
			elseif($page=="kometar"){
				$PAGE = $this->admin_panel->tbl_input_komentar();	
			}
			echo ('
			<div id="nav1" style="width:20%;">
				<div id="innerNav">
					<div id="innerHead">
						<div id="checklist"></div>
						<div id="textHead">Menu Admin</div>
					</div>
					<div id="inner" class="list">
						<table width="350" height="204" border="0" cellpadding="3" cellspacing="3">
						  <tr>
							<td width="152" height="23">
							<a href="'.base_url().'admin/index/admin/home">Master Posting</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/admin">Master Administrator</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/donlod">Master Download</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/galery">Master Galery</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/testi">Master Testimoni</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/agenda">Master Agenda</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/shout">Master Shoutbox</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/admin/kometar">Master Komentar</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'admin/index/logout">Logout</a></td>
						  </tr>
						</table>
					</div>
				</div>
			</div>
			<div id="nav1" style="width:72%; overflow:visible;">
				<div id="innerNav" style="padding:15px;">
					'.$PAGE.'
				</div>
			</div>');
           /* echo ';
				<ul>
							<li>'.anchor('0','Master Posting').'</li>
							<li>'.anchor('admin/index/admin/home','Master Administrator').'</li>
							<li>'.anchor('2','Master Download').'</li>
							<li>'.anchor('3','Master Galery').'</li>
							<li>'.anchor('4','Master Testimoni').'</li>
							<li>'.anchor('5','Master Agenda').'</li>
							<li>'.anchor('6','Master Shoutbox').'</li>
							<li>'.anchor('7','Master Komentar').'</li>
							<li>'.anchor('admin/index/logout','Logout').'</li>
						</ul>
				*/
        }
        else{
            redirect('admin/index');
        }
	}
}