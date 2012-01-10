<?php
class Cyber_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function insert($table,$set){
		$this->db->insert($table,$set);	
	}
	function get_all_data($table,$limitStart=null,$limitEnd=null){
		return $this->db->get($table,$limitEnd,$limitStart)->result();
	}
	function get_order($column,$order,$table,$limitStart='',$limitEnd=''){
		$this->db->order_by($column,$order);
		return $this->db->get($table,$limitEnd,$limitStart)->result();	
	}
	
	function get_id($table,$id){
		return $this->db->where('id',$id)->get($table)->row();
	}
	
	function distinct($column,$table){
		return $this->db->query("SELECT DISTINCT `".$column."` FROM `".$table."`")->result();	
	}
	
	function delete($table,$id){
		$this->db->delete($table, array('id'=>$id));	
	}
	
	function edit($set,$table,$id){
		$this->db->update($table,$set,array('id'=>$id));	
	}
	
    function update_views($id){
        $views = $this->db->where('id',$id)->get('m_posting')->row();
        $views = $views->view;
        $this->db->set('view',($views+1))->where('id',$id)->update('m_posting');
    }
}
?>