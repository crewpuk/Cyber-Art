<?php
class CI_Admin_panel{
    var $CI;
    
    function __construct(){
        $this->CI =& get_instance();
    }
	
	function tbl_input_posting(){
		$posting = $this->CI->cyber_model->get_all_data('m_posting',0,5);
		$table = '<h2>Artikel</h2><hr />';
		$table .= '<table width="100%" border="1" cellspacing="0" cellpadding="5">
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
		$subText = substr($p->isi,0,150);
		$someText = explode(' ',substr($p->isi,150,200));
		$table .=   '<tr>
					  <td align="center">'.$i.'</td>
					  <td>'.$p->tanggal.'</td>
					  <td>'.$p->title.'</td>
					  <td align="justify">'.nl2br($subText.$someText[0]).' ...</td>
					  <td>'.$p->kategori.'</td>
					  <td><img src="'.base_url().'images/art/'.$p->image.'" width="75" height="50" /></td>
					  <td align="center">'.$p->view.'</td>
					  <td align="center"><img src="'.base_url().'images/ubah.png" width="16" height="16"></td>
					  <td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					</tr>';
		}
		$table .='</table>';
		return $table;
	}
	
	function tbl_input_admin(){
		$table = '
				<h2>Halaman Admin</h2><hr />
				';
		return $table;
	}
	function tbl_input_download(){
		$download = $this->CI->cyber_model->get_all_data('m_download',0,5);
		$table = '<h2>Download</h2><hr />';	
		$table .= '<table width="100%" border="1" cellspacing="0" cellpadding="5">
					<tr>
					  <th>Nomor</th>
					  <th>Judul</th>
					  <th>Letak File</th>
					  <th>Hit</th>
					  <th>Tindakan</th>
					</tr>';
	   $i=0;
	   foreach($download as $d){
	   $i++;
	   $table .='	<tr>
					  <td align="center">'.$i.'</td>
					  <td>'.$d->title.'</td>
					  <td>'.base_url().'temp/download/'.$d->doc.'</td>
					  <td align="center">'.$d->view.'</td>
					  <td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					</tr>';
	   }
	   $table .='</table>';
		return $table;
	}
	function tbl_input_galery(){
		$table = '
			<h2>Galeri</h2><hr />
		';	
		return $table;
	}
	function tbl_input_testimoni(){
		$testimoni = $this->CI->cyber_model->get_all_data('m_testimoni',0,5);
		$table = '<h2>Testimonial</h2><hr />';
		$table .= '<table width="100%" border="1" cellspacing="0" cellpadding="5">
					  <tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Komentar</th>
						<th>Foto</th>
						<th>Tanggal Testimoni</th>
						<th colspan="2">Tindakan</th>
					  </tr>';
		$i = 0;
		foreach($testimoni as $tes){
		$i++;
		$table .= '
					  <tr>
						<td align="center">'.$i.'</td>
						<td>'.$tes->nama.'</td>
						<td>'.$tes->jabatan.'</td>
						<td>'.$tes->komentar.'</td>
						<td><img src="'.base_url().'images/testi/'.$tes->photo.'" width="75" height="50" /></td>
						<td>'.$tes->tanggal.'</td>
						<td align="center"><img src="'.base_url().'images/ubah.png" width="16" height="16"></td>
						<td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					  </tr>';
		}
  		$table .= '</table>';	
		return $table;
	}
	function tbl_input_agenda(){
		$table = '
			<h2>Agenda</h2><hr />
		';	
		return $table;
	}
	function tbl_input_shout(){
		$table = '
			<h2>Shoutbox</h2><hr />
		';	
		return $table;
	}
	function tbl_input_komentar(){
		$table = '
			<h2>Komentar</h2><hr />
		';	
		return $table;
	}
}
?>