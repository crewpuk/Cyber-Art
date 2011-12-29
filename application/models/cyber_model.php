<?php
class Cyber_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function insert($table,$set){
		$this->db->insert($table,$set);	
	}
	
	function get_all_data($table){
		return $this->db->get($table)->result();
	}
	
	function get_id($table,$id){
		return $this->db->where('id',$id)->get($table)->row();
	}
	
	function delete($table,$id){
		$this->db->delete($table, array('id'=>$id));	
	}
	
	function edit($set,$table,$id){
		$this->db->update($table,$set,array('id'=>$id));	
	}
	
}
?>