<?php
class CI_Admin_panel{
    var $CI;
    
    function __construct(){
        $this->CI =& get_instance();
    }
	
	function tbl_input_posting(){
		$table = '<h2>Artikel</h2><hr />';
		$table .= '<form method="post">
					<input type="submit" name="tambahPosting" value="Tambah" />
				   </form>';
		/***************** Form Input Posting ************************/
		if(isset($_POST['tambahPosting'])){
			$table .= form_open();
			$tmpl = array('table_open','<table cellpadding="5" cellspacing="0" width="100%"');
			$list = array(
			'Judul',form_input('judul'),
			'Isi',form_textarea('isi'),
			'Kategori',form_input('kategori'),
			'Gambar',form_upload('gambar'),
			'',form_submit('simpan_posting','Simpan').form_reset('reset','Reset')
			);
			$new_list = $this->CI->table->make_columns($list,2);
			$this->CI->table->set_template($tmpl);
			$table .= $this->CI->table->generate($new_list);
			$table .= form_close();
		}
		
		if(isset($_POST['simpan_posting'])){
				$set = array(
				'id_komentar'=>0,
				'tanggal'=>date('Y-m-d'),
				'title'=>$_POST['judul'],
				'isi'=>$_POST['isi'],
				'kategori'=>$_POST['kategori'],
				'image'=>$_POST['gambar'],
				'view'=>0
				);
				$simpan = $this->CI->cyber_model->insert('m_posting',$set);
				if($simpan){ echo "Berhasil"; }else{ echo "Gagal"; }
			}
		
		/***************** Detail Posting ************************/
		$posting = $this->CI->cyber_model->get_all_data('m_posting',0,5);
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
					  <td align="center"><a href="'.base_url().'admin/index/admin/home/ubah_posting"><img src="'.base_url().'images/ubah.png" width="16" height="16"></a></td>
					  <td align="center"><a href="'.base_url().'admin/index/admin/home/hapus_posting"><img src="'.base_url().'images/hapus.png" width="16" height="16"></a></td>
					</tr>';
		}
		$table .='</table>';
		
		if(isset($_GET["ubah_posting"])){ echo "Ubah"; }
		elseif($page=="hapus_posting"){ echo "Hapus"; }
		echo $_GET['d'];
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
		$agenda = $this->CI->cyber_model->get_all_data('m_agenda',0,5);
		$table = '<h2>Agenda</h2><hr />';
		$table .= '<table width="100%" border="1" cellspacing="0" cellpadding="5">
					  <tr>
						<th>Nomor</th>
						<th>Judul</th>
						<th>Agenda</th>
						<th>Tanggal Agenda</th>
						<th>Tempat</th>
						<th>Waktu</th>
						<th>Pengirim</th>
						<th>Tanggal Dibuat</th>
						<th colspan="2">Tindakan</th>
					  </tr>';
		$i = 0;
		foreach($agenda as $ag){
  		$i++;
		$table .= '	  <tr>
						<td align="center">'.$i.'</td>
						<td>'.$ag->title.'</td>
						<td>'.$ag->agenda.'</td>
						<td>'.$ag->tgl_agenda.'</td>
						<td>'.$ag->tempat_agenda.'</td>
						<td>'.$ag->waktu_agenda.'</td>
						<td>'.$ag->pengirim.'</td>
						<td>'.$ag->tanggal.'</td>
						<td align="center"><img src="'.base_url().'images/ubah.png" width="16" height="16"></td>
						<td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					  </tr>';
		}
  		$table .= '</table>';
		return $table;
	}
	function tbl_input_shout(){
		$shoutbox = $this->CI->cyber_model->get_all_data('m_shoutbox',0,5);
		$table = '<h2>Shoutbox</h2><hr />';	
		$table .= '<table width="100%" border="1" cellspacing="0" cellpadding="5">
					  <tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Url</th>
						<th>Pesan</th>
						<th>Waktu</th>
						<th>Tindakan</th>
					  </tr>';
		$i = 0;
		foreach($shoutbox as $sb){
		$i++;
  		$table .= '	  <tr>
						<td align="center">'.$i.'</td>
						<td>'.$sb->nama.'</td>
						<td>'.$sb->url.'</td>
						<td>'.$sb->pesan.'</td>
						<td>'.$sb->time_stamp.'</td>
						<td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					  </tr>';
		}
  		$table .= '</table>';
		return $table;
	}
	function tbl_input_komentar(){
		$komentar = $this->CI->cyber_model->get_all_data('m_komentar',0,5);
		$table = '<h2>Komentar</h2><hr />';
		$table .= '<table width="100%" border="1" cellspacing="0" cellpadding="5">
					  <tr>
						<th>Nomor</th>
						<th>Id Komentar</th>
						<th>Nama</th>
						<th>Website</th>
						<th>Isi</th>
						<th>Tanggal</th>
						<th>Tindakan</th>
					  </tr>';
		$i = 0;
		foreach($komentar as $km){
		$i++;
  		$table .= '   <tr>
						<td align="center">'.$i.'</td>
						<td align="center">'.$km->id_komentar.'</td>
						<td>'.$km->nama.'</td>
						<td>'.$km->website.'</td>
						<td>'.$km->isi.'</td>
						<td>'.$km->tanggal.'</td>
						<td align="center"><img src="'.base_url().'images/hapus.png" width="16" height="16"></td>
					  </tr>';
		}
  		$table .= '</table>';
		return $table;
	}
}
?>