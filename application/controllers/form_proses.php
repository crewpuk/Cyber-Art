<?php if(!defined('BASEPATH')) exit('No direct access script allowed');
class Form_proses extends CI_Controller{
    function __construct(){
        parent::__construct();
		$this->load->model('cyber_model');
    }
    
    function form($type="poling"){
        if(!empty($type)&&!empty($_POST)){
            if(strtolower($type)=="poling"&&$_POST['poling_state']=='1'){
                redirect(base_url().'home/polling/'.$_POST['poling']);
            }
            elseif(strtolower($type)=="shoutbox"&&$_POST['shoutbox_btn']=='Kirim'){
                $set = array('nama'=>$_POST['nama'],'url'=>$_POST['url'],'pesan'=>$_POST['pesan']);
                $this->cyber_model->insert('m_shoutbox',$set);
                redirect(str_replace('Cyber-Art/','',$_POST['back']));
                //redirect($_POST['back']);
            }
            else redirect(base_url());
        }
        else redirect(base_url());
    }
}