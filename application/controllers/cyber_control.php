<?php
class Cyber_control extends CI_Controller{
	
	function __Construct(){
		parent::__Construct();	
		$this->load->model('cyber_model');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('date');
	}
	
	function index(){
		//Memanggil File CSS
		$data['css'] = link_tag('style/style.css');
		$data['css'] .= link_tag('style/layout.css');
		$data['css'] .= link_tag('style/class.css');
		$data['css'] .= link_tag('images/favico.png','shortcut icon');
        
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
                <div class="rdMore">Selengkapnya</div>
                <hr />';
        }
        //////// End of Content
        	
		$this->load->view('main',$data);		
	}
}
?>