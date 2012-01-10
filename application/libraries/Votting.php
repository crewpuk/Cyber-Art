<?php if(!defined('BASEPATH')) exit('No direct access script allowed');

class CI_Votting{
    public $table = 'm_votting';
    function __construct(){
        $this->db_manage();
    }
    private function db_manage(){
        @mysql_query("CREATE TABLE IF NOT EXISTS `".$this->table."` ( `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , `nama` VARCHAR( 100 ) NOT NULL , `jml` BIGINT( 15 ) NOT NULL , `ip` VARCHAR( 30 ) NOT NULL , `time_stamp` TIMESTAMP NOT NULL) ENGINE = MYISAM ;");
    }
    public function add_votting($id){
        $a=@mysql_fetch_array(@mysql_query("SELECT jml FROM `".$this->table."` WHERE `id` = '".$id."'"));
        return @mysql_query("UPDATE `".$this->table."` SET `jml` = '".($a['jml']+1)."' WHERE `id`=".$id);
    }
    public function get_votting(){return $this->estimate_votting();}
    public function get_option(){
        $x=@mysql_query("SELECT nama,id FROM `".$this->table."` ORDER BY `id`");$r=array();
        $i=0;
        while($a=mysql_fetch_array($x)){
            $r[$i]['nama']=$a['nama'];
            $r[$i]['id']=$a['id'];
            $i++;
        }
        return $r;
        /*$r='';
        if($use_table){$b=true;$r.='<table cellpadding="3" cellspacing="0" border="0">';}
        else $b=false;
        $x=@mysql_query("SELECT nama,id FROM `".$this->table."` ORDER BY `id`");$r=array();
        $i=0;        
        while($a=mysql_fetch_array($x)){
            if($b)$r.='<tr><td>';
            if($i==$data['index_checked'])$ch=' checked="checked"';
            else $ch='';                        
            $r.='<input type="radio" name="'.$data['name'].'" id="'.$data['id'].'"'.$ch.' value="'.$a['id'].'" />';
            if($b)$r.='</td><td>';
            $r.=$a['nama'];
            if($b)$r.='</td></tr>';
            $i++;
        }
        if($b)$r.='</table>';        
        return $r;*/
    }
    private function estimate_votting(){
        $x=@mysql_query("SELECT (SELECT SUM(jml) FROM `".$this->table."`) AS jml_all,nama,jml,SUM((jml/(SELECT SUM(jml) FROM `".$this->table."`))*100) AS persen FROM `".$this->table."` GROUP BY nama");
        $r=array();
        $i=0;
        while($a=mysql_fetch_array($x)){
            $r[$i]['nama']=$a['nama'];
            $r[$i]['jml']=$a['jml'];
            $r[$i]['jml_all']=$a['jml_all'];
            $r[$i]['persen']=number_format($a['persen'],2);
            $i++;
        }
        return $r;
    }
}
/* End of file Votting.php */
/* Location: ./application/libraries/Votting.php */