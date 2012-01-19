<?php
class CI_Content_panel{
    var $CI;
    
    function __construct(){
        $this->CI =& get_instance();
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
        $tmpl = array('table_open'=>'<table border="0" cellpadding="3" cellspacing="0" width="100%" class="shoutbox_table">');
        $list = array('Nama',form_input(array('name'=>'nama','style'=>'width: 120px;')),'Website',form_input(array('name'=>'url','style'=>'width: 120px;')),'Pesan',form_textarea(array('name'=>'pesan','rows'=>'3','style'=>'width: 120px;')));
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
			"src" => "images/".$t->photo,
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
             $re_kategori .= '<div id="inner" class="list"><ul><li>';
			 
			 $re_kategori .= anchor('home/kategori/'.$kat->kategori,$kat->kategori);
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
				$re_komentar .=  '<div id="inner" class="list"><ul><li>';
				$re_komentar .=  anchor($kom->website,$kom->nama); 
				$re_komentar .= ' Pada'.anchor('home/artikel/'.$kom->id,$kom->title);
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
	 
		 foreach($gallery as $g){ 
			$img = array(
			"src" => base_url()."images/".$g->file,
			"title" => $g->nama_album,
			"alt" => $g->nama
			);
                   
			$re_gallery .= "<div class='archivesbox' align='center'>";
			$re_gallery .= "<a class='slide1' rel='".base_url()."images/".$g->file."'>";
			$re_gallery .= "<img src='".base_url()."images/".$g->file."' alt='' /></a></div>";
            } 
			return $re_gallery;
	}
}