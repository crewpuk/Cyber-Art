<?php
	function css_generate(){
		$css='';
		$css.=link_tag("style/style.css");
		$css.=link_tag('style/layout.css');
		$css.=link_tag('style/class.css');
		$css.=link_tag('style/slider.css');
		$css.=link_tag('assets/shadowbox/shadowbox.css');
		$css.=link_tag('images/favico.png','shortcut icon','');
		return $css;
	}

?>