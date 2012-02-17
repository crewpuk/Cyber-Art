<!DOCTYPE html>
<html>
<head>
<title>Cyber-Art | <?php echo($page_title);?></title>
<script src="<?php echo base_url().'js/jquery.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/shadowbox/shadowbox.js'?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    Shadowbox.init({
        continuous: true,
        overlayOpacity: 0.8
    },ShadowboxSetup);
});
</script>
<?php echo($head_attrib);?>
<style type="text/css">
#sb-body{
	background-color: #fff;
}
</style>
</head>

<body>
<?php echo($content);?>
</body>
</html>