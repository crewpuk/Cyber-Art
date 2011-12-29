<?php
class Cyber_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function insert($table,$set){
		$this->db->insert($table,$set);	
	}
	/**
	* @param :
	* $table = Nama Tabel
	* $limitStart = Query Limit Awal
	* $limitEnd = Query Limit Akhir
	*/
	function get_all_data($table,$limitStart='',$limitEnd=''){
		return $this->db->get($table,$limitEnd,$limitStart)->result();
	}
	/**
	* @param :
	* $table = Nama Tabel
	* $column = Kolom yang akan di urutkan
	* $order = Bernilai ASC atau DESC
	* $limitStart = Query Limit Awal
	* $limitEnd = Query Limit Akhir
	*/
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
	
}
?>