<?php
      function get_menu($data, $parent = 0) {
	  	  $html = "";
	      static $i = 1;
	      $tab = str_repeat(" ", $i);
	      if ($data[$parent]) {
		      $html .= "$tab<ul class='sf-menu'>";
			  $cc='';
			  $exRian = false;
			  if($i==1){
			  	$exRian = true;
				$cc='padding: .5em .3em;';
			  }
		      $i++;
			  $xRian = 0;
		      foreach ($data[$parent] as $v) {
			  	   $xRian++;
				   $c="";
				   if($exRian){
					   if($xRian==1){
						$c=' style="margin-left: 10px;'.$cc.'"';
					   }
					   else{
					   	$c=' style="'.$cc.'"';
					   }
				   }
			       $child = get_menu($data, $v->id);
			       $html .= "$tab<li".$c.">";
			       
			       
			       $path=TB_PATH;
				$blank='';
					if(preg_match('@^(?:http://)([^/]+)@i',$v->url)){
						$path='';
						$blank=' target="_blank"';
					}
					if($aT['url']==TB_PATH){
						$blank='';
					}
					$html .= '<a href="'.$path.''.$v->url.'"'.$blank.'>'.$v->title.'</a>';
			       if ($child) {
				       $i--;
				       $html .= $child;
				       $html .= "$tab";
			       }
			       $html .= '</li>';
		      }
		      $html .= "$tab</ul>";
		      return $html;
	      } 
        else {
		      return false;
	      }
      }

      $result = mysql_query("SELECT * FROM `tb_menu` ORDER BY `menu_order`");
      while ($row = mysql_fetch_object($result)) {
		   $data[$row->parent_id][] = $row;
      }

      $menu = get_menu($data);
      echo "$menu"; 
?>