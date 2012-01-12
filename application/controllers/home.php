<?php
class Home extends CI_Controller{
    /******************************** Fungsi Construct **********************************/
	function __Construct(){
		parent::__Construct();	
		$this->load->model('cyber_model');
		$this->load->helper(array('html','url','date','form'));
        $this->load->library(array("counter","votting"));
	}
	
	/******************************** Fungsi Index **********************************/
	function index(){
	    //Status Halaman [beranda|posting|lain]
	    $data['status_halaman'] = 'beranda';
		//Memanggil File CSS
		$data['css'][]=link_tag('style/style.css');
		$data['css'][]=link_tag('style/layout.css');
		$data['css'][]=link_tag('style/class.css');
		$data['css'][]=link_tag('style/lavalamp.css');
		$data['css'][]=link_tag('style/slider.css');
		$data['css'][]=link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 1 Artikel
		// Artikel di panggil lewat controller untuk memudahkan halaman2 berikutnya...
        $art = $this->cyber_model->get_order('id','DESC','m_posting',0,3);
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
		//Navigation 2 Terpopuler
		$data['populer'] = $this->cyber_model->get_order('view','DESC','m_posting',0,5);
		//Navigation 2 Terkini
		$data['terkini'] = $this->cyber_model->get_order('tanggal','DESC','m_posting',0,5);
        //galery
        $data['gallery'] = $this->cyber_model->get_all_data('m_gallery');
        //Panel Download
        $data['download'] = $this->cyber_model->get_order('id','DESC','m_download',0,5);
        //panelAgenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //base_url
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
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
        $data['counter']=$counter;
        // End of Counter
        
       
        // Poling
	    $v=$this->votting->get_option();
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
        // End of Poling
        
        //////// Content
        $data['content'] = '';
        foreach($art as $a) {
	    $subText = substr($a->isi,0,100);
	    $someText = explode(' ',substr($a->isi,100,200));
	    $dateDB = $a->tanggal;
	    $year = substr($dateDB,0,4);
	    $month = substr($dateDB,4,3);
	    $day = substr($dateDB,8);
	    $date = $day.$month.'-'.$year;
	    $img = array(
	    "src" => "images/art/".$a->image."",
	    "width" => "300",
	    "height" => "200",
	    "title" => "".$a->image."",
	    "alt" => "".$a->image.""
	    );
        $data['content'] .= '
                <div class="artHead">Posted On :'.$date.'</div>
                <div class="artTitle">'.$a->title.br(2).'</div>
                <div class="artImage">'.img($img).br(2).'</div>
                <div class="artText">'.nl2br($subText.$someText[0]).'...</div><br />
                <div class="rdMore">'.anchor('home/artikel/'.$a->id,'Selengkapnya').'</div>
                <hr />';
        }
        //////// End of Content
        	
		$this->load->view('main',$data);		
	}
	
	/******************************** Fungsi Artikel **********************************/
    function artikel($id){
        if(preg_match('#[0-9]+#',$id)&&$id!=0){
	    //Status Halaman [beranda|posting|lain]
	    $data['status_halaman'] = 'posting';
        // View
        $this->cyber_model->update_views($id);
        // End of View   
        
		//Memanggil File CSS
		$data['css'][]=link_tag('style/style.css');
		$data['css'][]=link_tag('style/layout.css');
		$data['css'][]=link_tag('style/class.css');
		$data['css'][]=link_tag('style/slider.css');
		$data['css'][]=link_tag('style/lavalamp.css');
		$data['css'][]=link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 1 Artikel
		// Artikel di panggil lewat controller untuk memudahkan halaman2 berikutnya...
        $art = $this->cyber_model->get_id('m_posting',$id);
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
		//Navigation 2 Terpopuler
		$data['populer'] = $this->cyber_model->get_order('view','DESC','m_posting',0,5);
		//Navigation 2 Terkini
		$data['terkini'] = $this->cyber_model->get_order('tanggal','DESC','m_posting',0,5);
		
        //galery
        $data['gallery'] = $this->cyber_model->get_all_data('m_gallery');
        //Panel Download
        $data['download'] = $this->cyber_model->get_order('id','DESC','m_download',0,5);
        //panelAgenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //base_url
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
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
        $data['counter']=$counter;
        // End of Counter
        
        // Poling
	    $v=$this->votting->get_option();
        $data['poling']=form_open('form_proses/form/poling');
        $data['poling'].=form_hidden('poling_state','1');
        foreach($v as $a){
            $po = array(
                        'name'        => 'poling',
                        'id'          => 'poling',
                        'value'       => $a['id']
                        );
            $data['poling'].=form_radio($po).' '.$a['nama']."<br />\n";
        }
        
        $data['poling'].=form_submit(array('value'=>'vote')).form_close();
        // End of Poling
        
        //////// Content
        $data['content'] = '';
        
	    $dateDB = $art->tanggal;
	    $year = substr($dateDB,0,4);
	    $month = substr($dateDB,4,3);
	    $day = substr($dateDB,8);
	    $date = $day.$month.'-'.$year;
	    $img = array(
	    "src" => "images/art/".$art->image."",
	    "width" => "300",
	    "height" => "200",
	    "title" => "".$art->image."",
	    "alt" => "".$art->image.""
	    );
        $data['content'] .= '
                <div class="artHead">Posted On :'.$date.'</div>
                <div class="artTitle">'.$art->title.br(2).'</div>
                <div class="artImage">'.img($img).br(2).'</div>
                <div class="artText">'.nl2br($art->isi).'</div><br />
                <hr />';
        //////// End of Content
        	
		$this->load->view('main',$data);
        }
        else{
        //$this->load->show_404('page');
        redirect(base_url());
        }
    }
	
	/******************************** Fungsi Gallery **********************************/
    function gallery(){
	    //Status Halaman [beranda|posting|lain]
	    $data['status_halaman'] = 'lain';
		//Memanggil File CSS
		$data['css'][]=link_tag('style/style.css');
		$data['css'][]=link_tag('style/layout.css');
		$data['css'][]=link_tag('style/class.css');
		$data['css'][]=link_tag('style/slider.css');
		$data['css'][]=link_tag('style/lavalamp.css');
		$data['css'][]=link_tag('images/favico.png','shortcut icon','');
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
		//Navigation 2 Terpopuler
		$data['populer'] = $this->cyber_model->get_order('view','DESC','m_posting',0,5);
		//Navigation 2 Terkini
		$data['terkini'] = $this->cyber_model->get_order('tanggal','DESC','m_posting',0,5);
		
        //galery
        $gallery = $this->cyber_model->get_all_data('m_gallery');
        //Panel Download
        $data['download'] = $this->cyber_model->get_order('id','DESC','m_download',0,5);
        //panelAgenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //base_url
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
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
        $data['counter']=$counter;
        // End of Counter
        
        // Poling
	    $v=$this->votting->get_option();
        $data['poling']=form_open('form_proses/form/poling');
        $data['poling'].=form_hidden('poling_state','1');
        foreach($v as $a){
            $po = array(
                        'name'        => 'poling',
                        'id'          => 'poling',
                        'value'       => $a['id']
                        );
            $data['poling'].=form_radio($po).' '.$a['nama']."<br />\n";
        }
        
        $data['poling'].=form_submit(array('value'=>'vote')).form_close();
        // End of Poling
        
        //////// Content
        $data['content'] = '';
        foreach($gallery as $g){ 
                    $img = array(
                    "src" => "images/".$g->file,
                    "width" => 100,
                    "height" => 100,
                    "title" => "".$g->nama_album."",
                    "alt" => "".$g->nama.""
                    );
                    
                    //echo '<div class="artImage">'.img($img).br(2).'</div>';
                   	$data['content'].= "<div class='testiGambar'>".img($img).br(1).$g->deskripsi."</div>";
					//echo "<div class='testi'>".img($img).br(2)."</div>";
                    //("'" .$g->nama. "'");
                    
                    }
        //////// End of Content
        	
		$this->load->view('main',$data);
    }
	
	/******************************** Fungsi Polling **********************************/
    function polling($id=null){
        if(preg_match('#[0-9]+#',$id)){
              $v=$this->votting->add_votting($id);
              if($v) redirect(base_url().'home/polling/');
              else redirect(base_url().'home/');
        }
        elseif($id==null){
	    //Status Halaman [beranda|posting|lain]
	    $data['status_halaman'] = 'lain';
		//Memanggil File CSS
		$data['css'][]=link_tag('style/style.css');
		$data['css'][]=link_tag('style/layout.css');
		$data['css'][]=link_tag('style/class.css');
		$data['css'][]=link_tag('style/slider.css');
		$data['css'][]=link_tag('style/lavalamp.css');
		$data['css'][]=link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
		//Navigation 2 Terpopuler
		$data['populer'] = $this->cyber_model->get_order('view','DESC','m_posting',0,5);
		//Navigation 2 Terkini
		$data['terkini'] = $this->cyber_model->get_order('tanggal','DESC','m_posting',0,5);
        //Panel Download
        $data['download'] = $this->cyber_model->get_order('id','DESC','m_download',0,5);
        //panelAgenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //base_url
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
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
        $data['counter']=$counter;
        // End of Counter
        
        // Poling
	    $v=$this->votting->get_option();
        $data['poling']=form_open('form_proses/form/poling');
        $data['poling'].=form_hidden('poling_state','1');
        foreach($v as $a){
            $po = array(
                        'name'        => 'poling',
                        'id'          => 'poling',
                        'value'       => $a['id']
                        );
            $data['poling'].=form_radio($po).' '.$a['nama']."<br />\n";
        }
        
        $data['poling'].=form_submit(array('value'=>'vote')).form_close();
        // End of Poling
        
        //////// Content
        $data['content'] = '<h2 align="center">Hasil Poling</h2>';
	    $v=$this->votting->get_votting();
        $data['content'] .= '<div align="center"><div style="width: 400px;height: 20px;">';
        $data['content'] .= '';
        $i=0;
        $cc = array('y','r','g','b');
        foreach($v as $a){
            $a['px'] = (400*$a['persen'])/100;
            $data['content'] .= '<div class="vot_res vot'.$i.'" title="'.($a['persen']).'%" style="width: '.($a['px']).'px;"></div>';
            $i++;
        }
        $data['content'] .= '</div></div>';
        
        $data['content'] .= '<div class="vot_legend">';
        $i=0;
        foreach($v as $a){
            $a['px'] = (400*$a['persen'])/100;
            $data['content'] .= '<div class="vot_col col'.$i.'" style="float: left;width: 15px;height: 15px;"></div><div class="vot_text" style="float: left;">'.$a['nama'].'</div><div style="clear: both;"></div>';
            $i++;
        }
        $data['content'] .= '</div>';
        
        //$data['content'] = $v;
        //////// End of Content
        	
		$this->load->view('main',$data);
        }
        else{
            redirect(base_url().'home/polling');
        }
    }
    
    function agenda($id){
		 //Status Halaman [beranda|posting|lain]
	    $data['status_halaman'] = 'lain';
		//Memanggil File CSS
		$data['css'][]=link_tag('style/style.css');
		$data['css'][]=link_tag('style/layout.css');
		$data['css'][]=link_tag('style/class.css');
		$data['css'][]=link_tag('style/lavalamp.css');
		$data['css'][]=link_tag('style/slider.css');
		$data['css'][]=link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
        //galery
        $data['gallery'] = $this->cyber_model->get_all_data('m_gallery');
        //agenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //Panel Download
        $data['download'] = $this->cyber_model->get_order('id','DESC','m_download',0,5);
        //panelAgenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //base_url
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
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
        $data['counter']=$counter;
        // End of Counter
        
        // Poling
	    $v=$this->votting->get_option();
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
            $data['poling'].=form_radio($po).' '.$a['nama']."<br />\n";
        }
        
        $data['poling'].="<br />".form_submit(array('value'=>'vote')).form_close();
        $data['poling'].=anchor(base_url().'home/polling/','Hasil Polling');
        // End of Poling
        
        //////// Content
        $data['content'] = '';
        $a = $this->cyber_model->get_id('m_agenda', $id);
			$data['content'] .= '
				<div><strong>'.$a->title.'</strong></div>
				<div><strong>Diposting Tanggal </strong>'.$a->tanggal.'</div>
				<div><strong>Topik </strong>'.$a->agenda.'</div>
				<div><strong>Tanggal </strong>'.$a->tgl_agenda.'</div>
				<div><strong>Tempat </strong>'.$a->tempat_agenda.'</div>
				<div><strong>Pukul </strong>'.$a->waktu_agenda.'</div>
				<div><strong>Pengirim [Contact Us]</strong>'.$a->pengirim.'</div>
				
					';
        //////// End of Content
        	
		$this->load->view('main',$data);	
		
		
	}
	
	function download($id){
		$this->cyber_model->update_views($id,'m_download');
		$patch = $this->cyber_model->get_id('m_download',$id);
		
		redirect(base_url().'temp/download/'.$patch->doc);
	}
	
	function kategori(){
		
		
		 //Status Halaman [beranda|posting|lain]
	    $data['status_halaman'] = 'lain';
		//Memanggil File CSS
		$data['css'][]=link_tag('style/style.css');
		$data['css'][]=link_tag('style/layout.css');
		$data['css'][]=link_tag('style/class.css');
		$data['css'][]=link_tag('style/lavalamp.css');
		$data['css'][]=link_tag('style/slider.css');
		$data['css'][]=link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
        //galery
        $data['gallery'] = $this->cyber_model->get_all_data('m_gallery');
        //agenda
        $data['per_kategori'] = $this->cyber_model->get_all_per_kategori($kategori,'m_posting','DESC',0,5);
        //Panel Download
        $data['download'] = $this->cyber_model->get_order('id','DESC','m_download',0,5);
        //panelAgenda
        $data['agenda'] = $this->cyber_model->get_order('id','ASC','m_agenda',0,3);
        //base_url
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
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
        $data['counter']=$counter;
        // End of Counter
        
        // Poling
	    $v=$this->votting->get_option();
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
            $data['poling'].=form_radio($po).' '.$a['nama']."<br />\n";
        }
        
        $data['poling'].="<br />".form_submit(array('value'=>'vote')).form_close();
        $data['poling'].=anchor(base_url().'home/polling/','Hasil Polling');
        // End of Poling
        
        //////// Content
        $data['content'] = '';
        $art = $this->cyber_model->get_all_per_kategori($kategori,'m_posting','DESC',0,5);
			$data['content'] .= '';
			 foreach($art as $a) {
	    $subText = substr($a->isi,0,100);
	    $someText = explode(' ',substr($a->isi,100,200));
	    $dateDB = $a->tanggal;
	    $year = substr($dateDB,0,4);
	    $month = substr($dateDB,4,3);
	    $day = substr($dateDB,8);
	    $date = $day.$month.'-'.$year;
	    $img = array(
	    "src" => "images/art/".$a->image."",
	    "width" => "300",
	    "height" => "200",
	    "title" => "".$a->image."",
	    "alt" => "".$a->image.""
	    );
        $data['content'] .= '
                <div class="artHead">Posted On :'.$date.'</div>
                <div class="artTitle">'.$a->title.br(2).'</div>
                <div class="artImage">'.img($img).br(2).'</div>
                <div class="artText">'.nl2br($subText.$someText[0]).'...</div><br />
                <div class="rdMore">'.anchor('home/artikel/'.$a->id,'Selengkapnya').'</div>
                <hr />';
        }	
        //////// End of Content
        	
		$this->load->view('main',$data);	
	}
}
?>
