<?php
class Cyber_control extends CI_Controller{
    
	function __Construct(){
		parent::__Construct();	
		$this->load->model('cyber_model');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('date');
        $this->load->library("counter");
	}
	
	function index(){
		//Memanggil File CSS
		$data['css'] = link_tag('style/style.css');
		$data['css'] .= link_tag('style/layout.css');
		$data['css'] .= link_tag('style/class.css');
		$data['css'] .= link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 1 Artikel
		// Artikel di panggil lewat controller untuk memudahkan halaman2 berikutnya...
        $art = $this->cyber_model->get_order('id','DESC','m_posting',0,3);
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
        $data['base_url_link'] = base_url();
        
        $data['gallery']='<div>';
        
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
                <div class="rdMore">'.anchor('cyber_control/artikel/'.$a->id,'Selengkapnya').'</div>
                <hr />';
        }
        //////// End of Content
        	
		$this->load->view('main',$data);		
	}
    function artikel($id){
        if(preg_match('#[0-9]+#',$id)&&$id!=0){
        // View
        $this->cyber_model->update_views($id);
        // End of View   
        
		//Memanggil File CSS
		$data['css'] = link_tag('style/style.css');
		$data['css'] .= link_tag('style/layout.css');
		$data['css'] .= link_tag('style/class.css');
		$data['css'] .= link_tag('images/favico.png','shortcut icon','');
        
		//Navigation 1 Artikel
		// Artikel di panggil lewat controller untuk memudahkan halaman2 berikutnya...
        $art = $this->cyber_model->get_id('m_posting',$id);
		//Navigation 1 Berita Sebelumnya
		$data['berita'] = $this->cyber_model->get_order('id','ASC','m_posting',0,5);
		//Navigation 2 Testimonial
		$data['testimoni'] = $this->cyber_model->get_order('id','DESC','m_testimoni',0,5);
		//Navigation 2 Kategori Berita
        $data['kategori'] = $this->cyber_model->distinct('kategori','m_posting');
        $data['base_url_link'] = base_url();
        
        // Counter
        $counter['number']=$this->counter->get_counter();
        $counter['html']='';
        $max = 8;
        $length = strlen($counter['number']['all']);
        for($i=0;$i<($max-$length);$i++){
        	$counter['html'].='<img src="http://crewpuk-org.co.cc/images/counter/0.png" />';
        }
        for($i=0;$i<$length;$i++){
        	$counter['html'].='<img src="http://crewpuk-org.co.cc/images/counter/'.substr($counter['number']['all'],$i,1).'.png" />';
        }
        $data['counter']=$counter;
        // End of Counter
        
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
}
?>