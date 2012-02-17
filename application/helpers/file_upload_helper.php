<?php
	function generate_name($digit=20){
	    $max=$digit;
	    $name='';
	    for($i=0;$i<$max;$i++){
	        if($i%8==0 && $i>0)$name.="_";
	        $name.=rand(0,9);
	    }
	    return $name;
	}
	function image_name($path,$file_name){
	    $name=generate_name();
	    $i=0;
	    $e=explode('.',$file_name);
	    $ext=$e[count($e)-1];
	    while($i<1){
	        if(file_exists($path.$name.'.'.$ext))$name=$this->generate_name();
	        else $i++;
	    }
	    return $name.'.'.$ext;
	}