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
		//$this->db->order_by($column,$order);
		return $this->db->order_by($column,$order)->get($table,$limitEnd,$limitStart)->result();
	}
	function get_all_per_kategori($kategori/*,$table,$order,$limitStart=null,$limitEnd=null*/){
		//sementara di hardcode
		return $this->db->query("SELECT * FROM  
								`m_posting` WHERE  
								`kategori` =  
								'".$kategori."' 
								LIMIT 0 , 5")->result();
		// bila memakai parameter
		/*where('kategori',$kategori)->
		order_by('id',$order)->
		get($table,$order,$limitStart,$limitEnd)->result();	 */
	}
	function get_id($table,$id){
		return $this->db->where('id',$id)->get($table)->row();
	}
	
	function get_query($sql,$array){
		if(!$array){return $this->db->query($sql)->result();}
		else{$r = $this->db->query($sql)->result_array(); return $r[0];}
	}
	
	function distinct($column,$table){
		return $this->db->query("SELECT DISTINCT(".$column.") AS dis,(SELECT SUM(view) 
								FROM `".$table."` WHERE `kategori` = dis ) 
								AS merge FROM `".$table."`")->result();
	}
	
	function delete($table,$id){
		$this->db->delete($table, array('id'=>$id));	
	}
	
	function edit($set,$table,$id){
		$this->db->update($table,$set,array('id'=>$id));	
	}
    function update_views($id,$table='m_posting'){
        $views = $this->db->where('id',$id)->get($table)->row();
        $views = $views->view;
        $this->db->set('view',($views+1))->where('id',$id)->update($table);
    }
	function terkait($kategori,$title_now){
		return $this->db->query('SELECT title FROM `m_posting` 
								WHERE `kategori` LIKE \'%'.$kategori.'%\' AND `title` != \''.$title_now.'\' LIMIT 0, 5 ')->result();

	}
	function join_table_komentar(){
			$this->db->select('*');
			$this->db->from('m_posting');
			return $this->db->join('m_komentar', 'm_komentar.id_komentar = m_posting.id')->get(0,5)->result();
	}
	function get_login(){
		$ee = $this->db->
					get_where('m_admin',
						array(
							'username'=>$_POST['username'],
							'password'=>md5($_POST['password'])))
			->result_array();
		return $ee[0];
	}
	    
    function login($username, $password){
        $data = $this->db
                ->where(array('username' => $username, 
							  'password' => md5($password)))
                ->get('m_admin');
        //dicek
        if ($data->num_rows() > 0){
            $user = $data->row();
 
            //data hasil seleksi dimasukkan ke dalam $session
            $session = array(
                'logged_in' => 1,
                'id_user' => $user->id
            );
 
            //data dari $session akhirnya dimasukkan ke dalam session (menggunakan library CI)
            $this->session->set_userdata($session);
            return true;
        }else{
            $this->session->set_flashdata('notification', 
										  'Username dan Password tidak cocok');
            return false;
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
    }
}
?>
