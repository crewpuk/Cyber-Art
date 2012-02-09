<?php
class CI_Admin_panel{
    var $CI;
    
    function __construct(){
        $this->CI =& get_instance();
    }
	
	function tbl_input_posting(){
		$table = '
				fhddhgh
				';
		return $table;
	}
	
	function tbl_input_admin(){
		$table = '
				Halaman Admin
				';
		return $table;
	}
}
?>