<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cyber Art</title>
<!------------------------- Link CSS  -------------------------->
<?php
echo $css;
?>
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
				  $subText = substr($a->isi,0,200);
				  $someText = explode(' ',substr($a->isi,200,300));
				  $img = array(
				  "src" => "images/art/".$a->image."",
				  "width" => "200",
				  "height" => "200",
				  "title" => "".$a->image.""
				  );
			?>
            	<div class="artHead"><?php echo $a->tanggal ?></div>
                <div class="artTitle"><?php echo $a->title ?></div>
                <div class="artImage"><?php echo img($img); ?></div>
                <div class="artText"><?php echo $subText.$someText[0]; ?>...</div>
                <div class="rdMore"></div>
                <hr />
            <?php } echo br(2); ?>
            <!------------------------- Inner Navigation 1.1  -------------------------->
            	<div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Berita Sebelumnya</div>
                    </div>
                    <div id="inner">Inner</div>
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
                    <div id="inner">Inner</div>
                </div>
                <!------------------------- Inner Navigation 2.2  -------------------------->    
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Kategori Berita</div>
                    </div>
                    <?php foreach($art as $a) { ?>
                    <div id="inner"><?php echo $a->kategori ?></div>
                    <?php } ?>
                </div>            
                <!------------------------- Inner Navigation 2.3  -------------------------->    
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Terpopuler</div>
                    </div>
                    <div id="inner">Inner</div>
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
