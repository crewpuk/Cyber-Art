<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cyber Art</title>
<!------------------------- Link CSS  -------------------------->
<?php
echo $css;
?>
<script src="<?php echo $base_url_link.'js/jquery.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery_tools.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery_assets.js'?>" type="text/javascript"></script>
</head>

<body>
<!------------------------- Layout  -------------------------->
<div id="layout">
<!------------------------- Navigation Header Menu  -------------------------->
	<div id="navHead">
    <a href="#">Beranda</a>
    <a href="#">Profil</a>
    <a href="#">E-Application</a>
    <a href="#">Program Studi</a>
    <a href="#">Pendaftaran Online</a>
    </div>
    <!------------------------- Banner  -------------------------->
    <div id="banner" title="Cyberart"></div>
    <!------------------------- Container Content  -------------------------->
    	<div id="container">
        <!------------------------- Navigation 1  -------------------------->
        	<div id="nav1">
            <?php foreach($art as $a) {
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
			 ?>
            	<div class="artHead">Posted On : <?php echo $date ?></div>
                <div class="artTitle"><?php echo $a->title.br(2) ?></div>
                <div class="artImage"><?php echo img($img).br(2) ?></div>
                <div class="artText"><?php echo nl2br($subText.$someText[0]); ?>...</div><br />
                <div class="rdMore">Selengkapnya</div>
                <hr />
            <?php } echo br(2); ?>
            <!------------------------- Inner Navigation 1.1  -------------------------->
            	<div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Berita Sebelumnya</div>
					</div>
                    <?php foreach($berita as $b) { ?>
                    <div id="inner" class="list"><ul><li><?php echo anchor('#',$b->title) ?></li></ul></div>
                    <?php } ?>
                </div>
			<!------------------------- Inner Navigation 1.2  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Galeri Foto</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>
                
            </div>
            <!------------------------- Navigation 2  -------------------------->
            <div id="nav2">
            <!------------------------- Inner Navigation 2.1  -------------------------->
            	<div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Testimonial</div>
                    </div>
                    <?php foreach($testimoni as $t) { ?>
                    <div id="inner">
                    <?php
                    $img = array(
					"src" => "images/".$t->photo,
					"width" => 50,
					"height" => 50,
					"title" => "".$t->nama."\n".$t->jabatan."",
					"alt" => "".$t->photo.""
					);
					echo "<div class='testiGambar'>".img($img)."</div>";
					echo "<div class='testi'>".$t->komentar."</div>";
					?>
                    </div>
                    <?php } ?>
                </div>
                <!------------------------- Inner Navigation 2.2  -------------------------->    
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Kategori Berita</div>
                    </div>
                    <?php foreach($kategori as $kat) { ?>
                    <div id="inner" class="list"><ul><li><?php echo anchor('#',$kat->kategori) ?></li></ul></div>
                    <?php } ?>
                </div>            
                <!------------------------- Inner Navigation 2.3  -------------------------->    
                <div id="innerNav">
                	<!--<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Terpopuler</div>
                    </div>
                    <div id="inner">Inner</div>-->
                    
                    <!-- Tab -->
                    <div class="hTab">
                        <a class="tab activeTab" id="Tab1">Terpopuler</a>
                        <a class="tab" id="Tab2">Terkini</a>
                        <a class="tab" id="Tab3">Komentar</a>
                    </div>
                    
                    <!-- Content Tab -->
                    <div class="contentTab" id="Tab1_content">
                        Populer
                    </div>
                    <div class="contentTab hide" id="Tab2_content">
                        Terkini
                    </div>
                    <div class="contentTab hide" id="Tab3_content">
                        Komentar
                    </div>
                    
                </div>       
                <!------------------------- Inner Navigation 2.4 -------------------------->     
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Download</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>            
                <!------------------------- Inner Navigation 2.5  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Agenda</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>                   
            </div>
            <!------------------------- Navigation 3  -------------------------->
            <div id="nav3">
            	<div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Online Support</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>
                <!------------------------- Inner Navigation 3.1  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Statistik</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>
                <!------------------------- Inner Navigation 3.2  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Polling</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>
                <!------------------------- Inner Navigation 3.3  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Shout Box</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>
                <!------------------------- Inner Navigation 3.4  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Supported By</div>
                    </div>
                    <div id="inner">Inner</div>
                </div>
            </div>
        </div>
    <br class="clear" /><br class="clear" />
    <!------------------------- Footer  -------------------------->
	<div id="footer">
    |<a href="#"> Beranda </a>|
    <a href="#"> Berita </a>|
    <a href="#"> Agenda </a>|
    <a href="#"> Galeri </a>|
    <a href="#"> Download </a>|
    <a href="#"> Hubungi Kami </a>|
    <a href="#"> Webmail </a>|
    <br />
	Copyright &copy; 2011 Cyberart and Crewpuk-org. All Rights Reserved.
    </div>
</div>
</body>
</html>
