<?php
class CI_Content_panel{
    var $CI;
    
    function __construct(){
        $this->CI =& get_instance();
    }
	
	function panel_komentar_artikel($id){
		//komentar
		$table  = 
		'<form id="form1" name="form1" method="post" action="'.base_url().'home/artikel/'.$id.'/1">
				<table width="390" border="0" cellpadding="3" cellspacing="3">
			<tr>
			<td width="61">Nama</td>
			<td width="308">
			  	<input type="text" name="nama" />
			  	<input type="hidden" name="id_komentar" value="'.$id.'" />
			</td>
			</tr>
			<tr>
			  <td>Website</td>
			  <td><input type="text" name="website" /></td>
			</tr>
			<tr>
			  <td valign="top">Komentar</td>
			  <td><textarea name="isi" cols="25" rows="5"></textarea></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input type="submit" value="Kirim" /></td>
			</tr>
		  </table>
		</form>';
		
		return $table;		
	}
	
    function panel_counter(){
        // Counters
        $counter['number']=$this->CI->counter->get_counter();
        $counter['html']='';
        $img_url = base_url().'/images';
        $max = 8;
        $length = strlen($counter['number']['all']);
        for($i=0;$i<($max-$length);$i++){
        	$counter['html'].='<img src="'.$img_url.'/counter/0.png" />';
        }
        for($i=0;$i<$length;$i++){
        	$counter['html'].='<img src="'.$img_url.'/counter/'.substr($counter['number']['all'],$i,1).'.png" />';
        }
        return $counter;
        // End of Counter
    }
	
	function panel_shoutbox(){
		 // Shoutbox
        $data['shoutbox']='';
        $shout = $this->CI->db->query("SELECT * FROM `m_shoutbox` ORDER BY `time_stamp` DESC")->result();
        $data['shoutbox'].="<div style=\"height: 300px;overflow-y: scroll;\">";
        $i=1;
        foreach($shout as $d){
            $date = explode(' ',$d->time_stamp);
            $tgl = explode('-',$date[0]);
            $time_stamp = $date[1].' '.$tgl[2].'/'.$tgl[1].'/'.$tgl[0];
            $c=($i%2==0)?"s":"";
            $emot = array(';)'=>img(base_url().'images/emot/blink.gif'),':]'=>img(base_url().'images/emot/flirty.gif'),':D'=>img(base_url().'images/emot/bigsmile.gif'),':('=>img(base_url().'images/emot/sad.gif'),':)'=>img(base_url().'images/emot/smile.gif'));
            foreach($emot as $k=>$v){
                $src[] = $k;
                $rpl[] = $v;
            }
            $d->pesan = str_replace($src,$rpl,$d->pesan);
            $data['shoutbox'].="<div class=\"shoutbox_mess$c\"><strong><a href=\"$d->url\" target=\"_blank\">$d->nama</a></strong> mengatakan:\n<div class=\"shoutbox_pesan\">$d->pesan</div>\n$time_stamp</div>\n";
            $i++;
        }
        $data['shoutbox'].="</div>";
        $data['shoutbox'].=form_open('form_proses/form/shoutbox');
        $data['shoutbox'].=form_hidden('back',str_replace('index.php/','',$_SERVER['PHP_SELF']));
        $tmpl = array(
		'table_open'=>'<table border="0" cellpadding="3" cellspacing="0" width="100%" class="shoutbox_table">');
        $list = array(
		'Nama',form_input(array('name'=>'nama','style'=>'width: 120px;')),
		'Website',form_input(array('name'=>'url','style'=>'width: 120px;')),
		'Pesan',form_textarea(array('name'=>'pesan','rows'=>'3','style'=>'width: 120px;')));
        $new_list = $this->CI->table->make_columns($list, 2);
        $this->CI->table->set_template($tmpl);
        $data['shoutbox'].=$this->CI->table->generate($new_list);
        $emot = array('blink','flirty','bigsmile','sad','smile');
        $emotKey = array('blink'=>';)','flirty'=>':]','bigsmile'=>':D','sad'=>':(','smile'=>':)');
        foreach($emot as $e){
            $img = array(
    	    "src" => base_url()."images/emot/".$e.".gif",
    	    "title" => $emotKey[$e],
    	    "class" => "fortip_top"
    	    );
            $data['shoutbox'].=img($img);
        }
        $data['shoutbox'].='<br />'.form_submit(array('name'=>'shoutbox_btn'),'Kirim').form_close();
		
		return $data["shoutbox"];
        // End of Shoutbox
	}
	
	function panel_poling(){
		// Poling
	    $v=$this->CI->votting->get_option();
        $data['poling']='';
        $data['poling'].="<h4>Mau Kemana Setelah SMU atau SMK? </h4>";
        $data['poling'].=form_open('form_proses/form/poling');
        $data['poling'].=form_hidden('poling_state','1');
        foreach($v as $a){
            $po = array(
                        'name'        => 'poling',
                        'id'          => 'poling',
                        'value'       => $a['id']
                        );
            $data['poling'].='<label>'.form_radio($po).' '.$a['nama']."</label><br />\n";
        }
        $data['poling'].="<br />".form_submit(array('value'=>'vote')).form_close();
        $data['poling'].=anchor(base_url().'home/polling/','Hasil Polling');
		
		return $data["poling"];
        // End of Poling
	}
	
	function panel_testimoni(){
		$testimoni = $this->CI->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		
		foreach($testimoni as $t) { 
		  
        $testi .= '<div id="inner">';
			$img = array(
			"src" => "images/testi/".$t->photo,
			"width" => 50,
			"height" => 50,
			"class" => "fortip",
			"title" => "".$t->nama."<br />".$t->jabatan."",
			"alt" => "".$t->photo.""
					);
			$testi .= "<div class='testiGambar'>".img($img)."</div>";
			$testi .= "<div class='testi'>".$t->komentar."</div>";
			$testi .= '</div>';
        	} 
		
		return $testi;
	}
	
	function panel_kat_berita(){
		 $kategori = $this->CI->cyber_model->distinct('kategori','m_posting');
		 	 foreach($kategori as $kat) {
             $re_kategori .= '<div id="inner" class="list" ><ul><li class="fortip" title="Telah Dilihat '.$kat->merge.' kali">';
			 $re_kategori .= anchor('home/kategori/'.$kat->dis,$kat->dis);
			 $re_kategori .= '</li></ul></div>';
                 }
		 return $re_kategori;
	}
	
	function panel_terpopuler(){
		$populer = $this->CI->cyber_model->get_order('view','DESC','m_posting',0,5);
			foreach($populer as $pop) {
             $re_populer .= '<div id="inner" class="list"><ul><li>';
			 $re_populer .= anchor('home/artikel/'.$pop->id,$pop->title);
             $re_populer .= '</li></ul></div>';
             }
		
		return $re_populer; 
	}
	
	function panel_terkini(){
		$terkini = $this->CI->cyber_model->get_order('tanggal','DESC','m_posting',0,5);
		
		foreach($terkini as $ter) { 
        $re_terkini .=  '<div id="inner" class="list"><ul><li>';
		$re_terkini .=  anchor('home/artikel/'.$ter->id,$ter->title);
		$re_terkini .=  '</li></ul></div>';
        	}
		return $re_terkini;
	}
	
	function panel_komentar(){
		$komentar = $this->CI->cyber_model->join_table_komentar();
			foreach($komentar as $kom) {
				$re_komentar .=  '<div id="inner" class="list">
									<ul class="fortip" title="'.substr($kom->isi,0,30).'..."><li>';
				$re_komentar .=  anchor($kom->website,$kom->nama); 
				$re_komentar .= ' Pada '.anchor('home/artikel/'.$kom->id,$kom->title);
				$re_komentar .= '</li></ul></div>';	 
			}
		return $re_komentar;
	}
	
	function panel_download(){
	$download = $this->CI->cyber_model->get_order('id','DESC','m_download',0,5);	
		 foreach($download as $down) { 
						
		 $re_download .= '<div id="inner" class="list"><ul><li>';
		 $re_download .= anchor($base_url_link.'home/download/'.$down->id,$down->title);
		 $re_download .= '</li></ul></div>';
		  }
		 return $re_download;
		}
		
	function panel_agenda(){
		 $agenda = $this->CI->cyber_model->get_order('id','ASC','m_agenda',0,3);
		 
		 foreach($agenda as $agen) {
					
        	$re_agenda .= '<div id="inner" class="list"><ul><li>';
			$re_agenda .= anchor('home/agenda/'.$agen->id,$agen->title);
			$re_agenda .= '</li></ul></div>';
            }
			return $re_agenda;
	}
	
	function panel_gallery(){
	 	 $gallery = $this->CI->cyber_model->get_all_data('m_gallery');
		 $re_gallery='';
		 $gallery_setup='';
		 foreach($gallery as $g){
		 	$h='';
		 	if($nm_album==NULL){
			 	$nm_album=$g->nama_album;
		 		$no_img=0;
		 		
		 	}
		 	if($nm_album!=$g->nama_album){
			 	$nm_album=$g->nama_album;
			 	$no_img=0;
			}
		 	if($nm_album==$g->nama_album){
		 		$strrpl_nama_album = str_replace(' ', '_', $g->nama_album);
		 		if($no_img>0)$h=' hidden';
		 		if($no_img==0)$re_gallery.="<div class='archivesbox' align='center'>";
		 		$re_gallery.='<a class="'.$strrpl_nama_album.$h.'" title="'.$g->deskripsi.'" href="'.base_url().'images/gallery/'.$g->file.'">';
		 		if($no_img==0){
			 		$re_gallery.='<img src="'.base_url().'images/gallery/'.$g->file.'" alt="'.$g->nama.'" />';
			 		$gallery_setup.='Shadowbox.setup("a.'.$strrpl_nama_album.'",{gallery:"'.$strrpl_nama_album.'",continuous:true,counterType:"skip"});';
		 		}
		 		$re_gallery.='</a>';
		 		if($no_img==0)$re_gallery .= "</div>";
		 		$no_img++;
		 	}
         }
		 $re_gallery.='<script type="text/javascript">function ShadowboxSetup(){'.$gallery_setup.'}</script>';

		 return $re_gallery;
	}

	function panel_navigation_menu(){
		$nvmn_0=$this->CI->db->where('id_parent',0)->get('m_navigation_menu')->result();
		$re='<ul class="navigation" id="main-menu">';
		foreach($nvmn_0 as $nvmn){
			$link_0=str_replace( array('[main]','[home]') , array(base_url(),base_url().'home/'), $nvmn->url);
			$re .= '<li><a href="'.$link_0.'">'.$nvmn->title.'</a>';
				// $nvmn_c_state=(($this->CI->db->where('id_parent',$nvmn->id)->get('m_navigation_menu')->num_rows())>0)?true:false;
				// if($nvmn_c_state){
				// 	$re .= '<ul>';
				// 	$nvmn_child=$this->CI->db->where('id_parent',$nvmn->id)->get('m_navigation_menu')->result();
				// 	foreach($nvmn_child as $nvmn_c){
				// 		$link_c=str_replace( array('[main]','[home]') , array(base_url(),base_url().'home/'), $nvmn_c->url);
				// 		$re .= '<li><a href="'.$link_c.'">'.$nvmn_c->title.'</a></li>';
				// 	}
				// 	$re .= '</ul>';
				// }
			$re .= '</li>';
		}
		$re .= '</ul>';
		return $re;
	}
}