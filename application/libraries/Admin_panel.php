<?php
class CI_Admin_panel{
    var $CI;
    
    function __construct(){
        $this->CI =& get_instance();
    }
	
	function tbl_input_posting(){
		$posting = $this->CI->cyber_model->get_all_data('m_posting',0,5);
		$table = '<table width="50%" border="1" cellspacing="0" cellpadding="5">
					<tr>
					  <th>Nomor</th>
					  <th>Tanggal</th>
					  <th>Judul</th>
					  <th>Isi</th>
					  <th>Kategori</th>
					  <th>Gambar</th>
					  <th>Hit</th>
					  <th colspan="2">Tindakan</th>
					</tr>';
		$i = 0;
		foreach($posting as $p){
		$i++;
		$table .=   '<tr>
					  <td>'.$i.'</td>
					  <td>'.$p->tanggal.'</td>
					  <td>'.$p->title.'</td>
					  <td>'.$p->isi.'</td>
					  <td>'.$p->kategori.'</td>
					  <td>'.$p->image.'</td>
					  <td>'.$p->view.'</td>
					  <td align="center"><img src="'.base_url().'images/ubah.png" width="16" height="16"></td>
					  <td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					</tr>';
		}
		$table .='</table>';
		return $table;
	}
	
	function tbl_input_admin(){
		$table = '
				Halaman Admin
				';
		return $table;
	}
	function tbl_input_download(){
		$table = '
			adsafafsadsadsd ad
		';	
		return $table;
	}
	function tbl_input_galery(){
		$table = '
			galery page
		';	
		return $table;
	}
	function tbl_input_testimoni(){
		$table = '
			testimoni page
		';	
		return $table;
	}
	function tbl_input_agenda(){
		$table = '
			agenda page
		';	
		return $table;
	}
	function tbl_input_shout(){
		$table = '
			shout page
		';	
		return $table;
	}
	function tbl_input_komentar(){
		$table = '
			komentar page
		';	
		return $table;
	}
}
?>