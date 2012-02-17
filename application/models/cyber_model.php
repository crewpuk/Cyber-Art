<?php
class Cyber_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function insert_artikel(){
		$file = $_FILES['gambar'];
		$path = 'C://';
		if(move_uploaded_file($file['tmp_name'], $path.$file['name'])){
			return $this->db->query("INSERT INTO `m_posting` VALUES(NULL,CURDATE(),'".$_POST['judul']."','".$_POST['isi']."','".$_POST['kategori']."','".$file['name']."','0')");
			/*title	isi	kategori	image	view*/
			//return("INSERT INTO `m_posting` VALUES(NULL,CURDATE(),'".$_POST['judul']."',".$_POST['isi'].",".$_POST['kategori'].",'0')");
		}
	}
	function insert($table,$set){
		$this->db->insert($table,$set);	
	}
	function get_all_data($table,$limitStart=null,$limitEnd=null){
		return $this->db->where('status','1')->get($table,$limitEnd,$limitStart)->result();
	}
	function get_order($column,$order,$table,$limitStart='',$limitEnd=''){
		//$this->db->order_by($column,$order);
		return $this->db->where('status','1')->order_by($column,$order)->get($table,$limitEnd,$limitStart)->result();
	}
	function get_all_per_kategori($kategori/*,$table,$order,$limitStart=null,$limitEnd=null*/){
		//sementara di hardcode
		return $this->db->query("SELECT * FROM  `m_posting` WHERE  
								`kategori` =  '".$kategori."' AND
								`status` = '1' 
								LIMIT 0 , 5")->result();
		// bila memakai parameter
		/*where('kategori',$kategori)->
		order_by('id',$order)->
		get($table,$order,$limitStart,$limitEnd)->result();	 */
	}
	function get_id($table,$id){
		return $this->db->where(array('id'=>$id,'status'=>'1'))->get($table)->row();
	}
	
	function get_query($sql,$array){
		if(!$array){return $this->db->query($sql)->result();}
		else{$r = $this->db->query($sql)->result_array(); return $r[0];}
	}
	
	function distinct($column,$table){
		return $this->db->query("SELECT DISTINCT(".$column.") AS dis, 
								(SELECT SUM(view) FROM `".$table."` WHERE `kategori` = dis ) AS merge 
								FROM `".$table."` WHERE `status` = '1'")->result();
	}
	
	function delete($table,$id){
		//$this->db->delete($table, array('id'=>$id));	
		$this->db->set('status','0')->where('id',$id)->update($table);
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
								WHERE `kategori` LIKE \'%'.$kategori.'%\' AND `title` != \''.$title_now.'\' AND `status` = "1" LIMIT 0, 5 ')->result();

	}
	function join_table_komentar(){
			$this->db->select('*');
			$this->db->from('m_posting');
			return $this->db->join('m_komentar', 'm_komentar.id_komentar = m_posting.id')->where(array('m_posting.status'=>'1','m_komentar.status'=>'1'))->get(0,5)->result();
			//return $this->db->query("SELECT * FROM `m_posting` JOIN `m_komentar` ON `m_komentar`.`id_komentar` = `m_posting`.`id` 
			//						WHERE `m_posting`.`status` = '1' AND `m_komentar`.`status` = '1' LIMIT 0,5")->result();
	}
	function get_login(){
		$ee = $this->db->
					get_where('m_admin',
						array(
							'username'=>$_POST['username'],
							'password'=>md5($_POST['password']),
							'status'=>'1'))
			->result_array();
		return $ee[0];
	}
	    
    function login($username, $password){
        $data = $this->db
                ->where(array('username' => $username, 
							  'password' => md5($password),
							  'status'=>'1'))
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