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
<script src="<?php echo $base_url_link.'js/jquery-1.1.3.1.min.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.easing.min.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.lavalamp.min.js'?>" type="text/javascript"></script>
 <script type="text/javascript">
        $(function() {
            $("#1, #2, #3").lavaLamp({
                fx: "backout", 
                speed: 700,
                click: function(event, menuItem) {
                    return false;
                }
            });
        });
    </script>
</head>

<body>
<div id="layout2"><img src="<?php echo $base_url_link;?>images/logo/cyberart_1.png" width="300" height="150"/></div>
<!------------------------- Layout  -------------------------->
<div id="layout">
	
<!------------------------- Navigation Header Menu  -------------------------->
	<div id="navHead">
		<ul class="lavaLampBottomStyle" id="3">
			<li><a href="#">Beranda</a></li>
			<li><a href="#">Profil</a></li>
			<li><a href="#">E-Application</a></li>
			<li><a href="#">Program Studi</a></li>
			<li><a href="#">Pendaftaran Online</a></li>	   
    </div>
    <!------------------------- Banner  -------------------------->
    <div id="banner" title="Cyberart"></div>
    <!------------------------- Container Content  -------------------------->
    	<div id="container">
        <!------------------------- Navigation 1  -------------------------->
        	<div id="nav1">
            <?php echo $content.br(2); ?>
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
                    <div id="inner"><?php $gallery;?></div>
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
                    <!-- Tab -->
                    <div class="hTab">
                        <a class="tab activeTab" id="Tab1" style="margin-left: 5px;">Terpopuler</a>
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
                    <div id="inner" align="center">
						<a href="ymsgr:sendIM?feldy.yusuf">
							<img border="0" 
							src="http://opi.yahoo.com/online?u=feldy.yusuf&m=g&t=2"/>
							</a>
					</div>
                </div>
                <!------------------------- Inner Navigation 3.1  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Statistik</div>
                    </div>
                    <div class="counter">
                        <div class="number" align="center"><?php echo($counter['html']); ?></div>
                        <div class="today">Pengunjung hari ini: <?php echo $counter['number']['today'];?></div>
                        <div class="all">Total pengunjung: <?php echo $counter['number']['all'];?></div>
                        <div class="today">Hits hari ini: <?php echo $counter['number']['hits']['today'];?></div>
                        <div class="all">Total hits: <?php echo $counter['number']['hits']['all'];?></div>
                        <div class="online">Pengunjung online: <?php echo $counter['number']['online'];?></div>
                    </div>
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
                    <div id="inner">
						<img src="<?php echo $base_url_link;?>images/support/Call.jpg"><br /><br>
						<img src="<?php echo $base_url_link;?>images/support/SMS.jpg"><br /><br>
						<img src="<?php echo $base_url_link;?>images/support/Alamat.jpg">
                    </div>
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
<div class="tooltip"></div>
</body>
</html>
