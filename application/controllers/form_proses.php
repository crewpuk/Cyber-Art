<?php if(!defined('BASEPATH')) exit('No direct access script allowed');
class Form_proses extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    
    function form($type="poling"){
        if(!empty($type)&&!empty($_POST)){
            if(strtolower($type)=="poling"&&$_POST['poling_state']=='1'){
                redirect(base_url().'home/polling/'.$_POST['poling']);
            }
        }
        else redirect(base_url());
    }
}