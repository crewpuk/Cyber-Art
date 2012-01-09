<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Counter{
    public $counter_table = 'm_counter';
    public $history_table = 'm_his';
	private $counter_today;
	private $counter_all;
    private $now_online;
    private $hits;
	
	public function __construct(){
	    $this->create_table();
		$this->add_date($this->see_now());
		$this->add_value($this->set_ip());
	}
	
    private function create_table(){
        @mysql_query("CREATE TABLE IF NOT EXISTS ".$this->counter_table." (`tgl` DATE NOT NULL ,`ip` LONGTEXT NOT NULL , `hits` BIGINT( 15 ) NOT NULL ,PRIMARY KEY ( `tgl` )) ENGINE = MYISAM ;");
        @mysql_query("CREATE TABLE IF NOT EXISTS ".$this->history_table." (`id` BIGINT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,`ip` VARCHAR( 50 ) NOT NULL ,`date` DATE NOT NULL ,`time` TIME NOT NULL ,`time_u` BIGINT( 11 ) NOT NULL) ENGINE = MYISAM ;");
    }
    
	public function get_counter(){
		// Begin All
		$sVAll = @mysql_query("SELECT * FROM ".$this->counter_table."");
		$c=0;
		while($aVAll = @mysql_fetch_array($sVAll)){
    		$eVAll = explode('|',$aVAll['ip']);
    		$c+=count($eVAll);
		}
		$this->counter_all = $c;
		// End All
        
		// Begin Today
		$sVAll = @mysql_query("SELECT * FROM ".$this->counter_table." WHERE `tgl` = CURDATE()");
		$c=0;
		while($aVAll = @mysql_fetch_array($sVAll)){
    		$eVAll = explode('|',$aVAll['ip']);
    		$c+=count($eVAll);
		}
		$this->counter_today = $c;
		// End Today
        
        // Hits
        $y = @mysql_fetch_array(@mysql_query("SELECT `hits` FROM ".$this->counter_table." WHERE `tgl` = CURDATE( ) "));
        $this->hits['today'] = $y['hits'];
        
        $y = @mysql_fetch_array(@mysql_query("SELECT SUM(hits) AS all_hits FROM ".$this->counter_table));
        $this->hits['all'] = $y['all_hits'];
        // End of Hits
        
        // History
        $now_online = @mysql_fetch_array(@mysql_query("SELECT COUNT(*) AS online FROM `". $this->history_table ."` WHERE `time_u` >= ".(date('U')-300)));
        $this->now_online = $now_online['online'];
        // End of History
        
		return array(
					"ip"=>$this->set_ip(),
					"today"=>$this->counter_today,
					"all"=>$this->counter_all,
					"online"=>$this->now_online,
                    "hits"=>$this->hits,
					0=>$this->counter_today,
					1=>$this->counter_all,
                    2=>$this->now_online,
                    3=>$this->hits
		);
	}
	private function set_ip(){
		if (isset($_SERVER["HTTP_CLIENT_IP"])){
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
			return $_SERVER["HTTP_X_FORWARDED"];
		}
		elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
			return $_SERVER["HTTP_FORWARDED_FOR"];
		}
		elseif (isset($_SERVER["HTTP_FORWARDED"])){
			return $_SERVER["HTTP_FORWARDED"];
		}
		else{
			return $_SERVER["REMOTE_ADDR"];
		}
	}
	private function see_now(){
		$seeNow = @mysql_query("SELECT * FROM ".$this->counter_table." WHERE `tgl` = CURDATE()");
		$sumNow = @mysql_num_rows($seeNow);
		$r = true;
		if($sumNow>=1){
			$r = false;
		}
		return $r;
	}
	private function add_date($seeNowState){
		if($seeNowState){
			$add = @mysql_query("INSERT INTO ".$this->counter_table."(tgl) VALUES(CURDATE())");
		}
	}
	private function add_value($ip){
	   // Value for Counter
		$seeValue = @mysql_query("SELECT * FROM ".$this->counter_table." WHERE `tgl` = CURDATE()");
		$aSeeValue = @mysql_fetch_array($seeValue);
		if($aSeeValue['ip']!=''){
			$eValue = explode('|',$aSeeValue['ip']);
			if(count($eValue)!=0){
				$state = false;
				for($i=0;$i<count($eValue);$i++){
					if($ip==$eValue[$i]){
						$state = true;
					}
				}
				if($state===false){
					$v = '';
					for($i=0;$i<count($eValue);$i++){
						$v.=$eValue[$i].'|';
					}
					$v.=$ip;
					/*$update = */@mysql_query("UPDATE ".$this->counter_table." SET `ip` = '".$v."' WHERE `tgl` = CURDATE() LIMIT 1");
				}
			}
			else{
				$v=$eValue[0].'|'.$ip;
				@mysql_query("UPDATE ".$this->counter_table." SET `ip` = '".$v."' WHERE `tgl` = CURDATE() LIMIT 1");
			}
		}
		else{
			@mysql_query("UPDATE ".$this->counter_table." SET `ip` = '".$ip."' WHERE `tgl` = CURDATE() LIMIT 1");
		}
        // End of Value of Counter
        
        // History
        $time_u = date("U");
        $q=@mysql_query("SELECT * FROM  ". $this->history_table ." WHERE  `ip` =  '".$ip."' AND  `time_u` >=".($time_u-300));
        if(@mysql_num_rows($q)==0){
            @mysql_query("INSERT INTO  ". $this->history_table ." VALUES (NULL , '".$ip."', CURDATE( ) , CURTIME( ) ,  '".$time_u."');");
        }
        // End of History
        
        // Hits
        $y = @mysql_fetch_array(@mysql_query("SELECT `hits` FROM  ".$this->counter_table." WHERE  `tgl` = CURDATE( ) "));
        $x = $y['hits'];
        @mysql_query("UPDATE ".$this->counter_table." SET `hits` = '".($x+1)."' WHERE  `tgl` = CURDATE( ) LIMIT 1 ;");
        // End of Hits
	}
}
/* End of file Counter.php */
/* Location: ./application/libraries/Counter.php */