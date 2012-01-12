<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cyber Art</title>
<!------------------------- Link CSS  -------------------------->
<?php
foreach($css as $key)echo $key."\n";
?>
<script src="<?php echo $base_url_link.'js/jquery.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.tools.min.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.easing.min.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.easing.compatibility.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.easing.1.3.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.lavalamp.min.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/jquery.assets.js'?>" type="text/javascript"></script>
<script src="<?php echo $base_url_link.'js/s3Slider.js'?>" type="text/javascript"></script>
</head>

<body>
<div id="layout2"><img src="<?php echo $base_url_link;?>images/logo/cyberart_1.png" width="300" height="150"/></div>
<!------------------------- Layout  -------------------------->
<div id="layout">
	
<!------------------------- Navigation Header Menu  -------------------------->
	<div id="navHead">
		<ul class="lavaLampNoImage" id="3">
			<li><?php echo anchor($base_url_link,'Beranda')?></li>
			<li><?php echo anchor($base_url_link.'home/gallery/','Galeri')?></li>
			<li><a href="#">Profil</a></li>
			<li><a href="#">E-Application</a></li>
			<li><a href="#">Program Studi</a></li>
			<li><a href="#">Pendaftaran Online</a></li>	   
    </div>
    <!------------------------- Banner  -------------------------->
    <div id="banner">
		<div id="slider1">
        <ul id="slider1Content">
            <li class="slider1Image">
                <img src="<?php echo $base_url_link;?>images/banner.jpg" alt="1" />
                <span class="left"><strong>Title text 1</strong><br />Content text...</span></li>
            <li class="slider1Image">
                <img src="<?php echo $base_url_link;?>images/example_images/wide/2.jpg" alt="2" />
                <span class="left"><strong>Title text 2</strong><br />Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...</span></li>
            <li class="slider1Image">
                <img src="<?php echo $base_url_link;?>images/example_images/wide/3.jpg" alt="3" />
                <span class="left"><strong>Title text 2</strong><br />Content text...</span></li>
            <li class="slider1Image">
                <img src="<?php echo $base_url_link;?>images/example_images/wide/4.jpg" alt="4" />
                <span class="left"><strong>Title text 2</strong><br />Content text...</span></li>
            <li class="slider1Image">
                <img src="<?php echo $base_url_link;?>images/example_images/wide/5.jpg" alt="5" />
                <span class="left"><strong>Title text 2</strong><br />Content text...</span></li>
            <div class="clear slider1Image"></div>
        </ul>
    </div>
    </div>
    <!------------------------- Container Content  -------------------------->
    	<div id="container">
        <!------------------------- Navigation 1  -------------------------->
        	<div id="nav1">
            <?php echo $content; ?>
                
                <?php
                /************************** Status Halaman *******************************/
                if(strtolower($status_halaman)=='beranda'||strtolower($status_halaman)=='posting'){
                ?>
            <!------------------------- Inner Navigation 1.1  -------------------------->
            	<div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Berita Sebelumnya</div>
					</div>
                    <?php foreach($berita as $b) { ?>
                    <div id="inner" class="list"><ul><li><?php echo anchor('home/artikel/'.$b->id,$b->title) ?></li></ul></div>
                    <?php } ?>
                </div>
                <?php
                }
                /************************** Status Halaman *******************************/
                if(strtolower($status_halaman)=='beranda'){
                ?>
			<!------------------------- Inner Navigation 1.2  -------------------------->
                <div id="innerNav">
                	<div id="innerHead">
                    	<div id="checklist"></div>
                        <div id="textHead">Galeri Foto</div>
                    </div>
                    <div id="inner"><?php foreach($gallery as $g){ 
                    $img = array(
                    "src" => "images/".$g->file,
                    "width" => 100,
                    "height" => 100,
                    "title" => "".$g->nama_album."",
                    "alt" => "".$g->nama.""
                    );
                    
                    //echo '<div class="artImage">'.img($img).br(2).'</div>';
                   	echo "<div class='testiGambar'>".img($img).br(1).$g->deskripsi."</div>";
					//echo "<div class='testi'>".img($img).br(2)."</div>";
                    //("'" .$g->nama. "'");
                    
                    } ?></div>
                </div>
                <?php }/************************* Status Halaman *******************************/?>
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
                    "class" => "fortip",
					"title" => "".$t->nama."<br />".$t->jabatan."",
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
                    <!------------------------- Tab 1  --------------------------> 
                    <div class="contentTab" id="Tab1_content">
                        <?php foreach($populer as $pop) { ?>
                        <div id="inner" class="list"><ul><li><?php echo anchor('home/artikel/'.$pop->id,$pop->title) ?></li></ul></div>
                        <?php } ?>
                    </div>
                    <!------------------------- Tab 2  --------------------------> 
                    <div class="contentTab hide" id="Tab2_content">
                        <?php foreach($terkini as $ter) { ?>
                        <div id="inner" class="list"><ul><li><?php echo anchor('home/artikel/'.$ter->id,$ter->title) ?></li></ul></div>
                        <?php } ?>
                    </div>
                    <!------------------------- Tab 3  --------------------------> 
                    <div class="contentTab hide" id="Tab3_content">
                        <?php 
						$q = mysql_query("SELECT * FROM `m_posting`,`m_komentar` Where `m_posting`.`id`=`m_komentar`.`id_komentar`");
						while($data = mysql_fetch_array($q))
						{
						?>
                        <div id="inner" class="list">
                        	<ul>
                        		<li><?php echo anchor($data['website'],$data['nama']) ?> Pada <?php echo anchor('home/artikel/'.$data['id'],$data['title']) ?></li>
                       		</ul>
                        </div>
                        <?php } ?>
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
                    <div id="inner"><?php echo $poling;?></div>
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
    | <?php echo anchor($base_url_link,'Beranda')?> |
    <a href="#">Berita</a> |
    <a href="#">Agenda</a> |
    <?php echo anchor($base_url_link."home/gallery","Galeri");?> |
    <a href="#">Download</a> |
    <a href="#">Hubungi Kami</a> |
    <a href="#">Webmail</a> |
    <br />
	Copyright &copy; 2011 Cyberart and Crewpuk-org. All Rights Reserved.
    </div>
</div>
<div class="tooltip"></div>
</body>
</html>
