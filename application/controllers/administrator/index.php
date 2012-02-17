<?php if( ! defined("BASEPATH")) exit("No direct script access allowed");
class Index extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->library('session');
	}
	function index(){
		if(!isset($this->session->userdata['id_user'])) redirect(base_url().'administrator/login');
		else redirect(base_url().'administrator/dashboard');
	}
}