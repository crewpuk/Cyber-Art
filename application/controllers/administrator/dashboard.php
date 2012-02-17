<?php if( ! defined("BASEPATH")) exit("No direct script access allowed");
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('cyber_model'));
		$this->load->helper(array('form','css','html'));
        $this->load->library(array('table','session','admin_panel'));
	}
	function menu_samping($PAGE){
		return ('
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
							<a href="'.base_url().'administrator/dashboard/posting">Master Posting</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/admin">Master Administrator</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/download">Master Download</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/galery">Master Galery</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/testi">Master Testimoni</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/agenda">Master Agenda</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/shout">Master Shoutbox</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/dashboard/komentar">Master Komentar</a></td>
						  </tr>
						  <tr>
							<td height="23">
							<a href="'.base_url().'administrator/logout">Logout</a></td>
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
	}
	function home(){
		$this->posting();
	}
	function posting(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_posting();
			$data4view['content'] = $this->menu_samping($PAGE);
			//$data4view['content'] .= '<script type="text/javascript">function ShadowboxSetup(){Shadowbox.setup("a.sh_ubah_posting",{gallery:"sh_ubah_posting",continuous:true,counterType:"skip"});}</script>';
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function admin(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_admin();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function download(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_download();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function galery(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_galery();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function testi(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_testimoni();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function agenda(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_agenda();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function shout(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_shout();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function komentar(){
        if(isset($this->session->userdata['id_user']))
        {

			$data4view['page_title'] = "Administrator";
			$data4view['head_attrib']=$this->admin_panel->get_head_attrib();
			$PAGE = $this->admin_panel->tbl_input_komentar();
			$data4view['content'] = $this->menu_samping($PAGE);
			$this->load->view("admin",$data4view);

		}
		else
		{
			redirect(base_url().'administrator');
		}
	}
	function hapus($type='',$id=''){
		if($type!=='' && $id!==''){
		
		if($type=="posting"){
			$table = 'm_posting';
		}

			$this->cyber_model->delete($table,$id);
			redirect(base_url().'administrator/dashboard');	
		}
	}
}