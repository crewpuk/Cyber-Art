<?php
	function css_generate(){
		$css='';
		$css.=link_tag("style/style.css");
		$css.=link_tag('style/layout.css');
		$css.=link_tag('style/class.css');
		$css.=link_tag('style/lavalamp.css');
		$css.=link_tag('style/slider.css');
		$css.=link_tag('style/style_pop.css');
		$css.=link_tag('style/stylepop_up.css');
		$css.=link_tag('images/favico.png','shortcut icon','');
		return $css;
	}

?>