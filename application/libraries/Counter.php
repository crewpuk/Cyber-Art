<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Counter{
    public $table = 'm_counter';
	private $counter_today;
	//private $sumCounterWeek;
	//private $sumCounterMonth;
	//private $sumCounterYear;
	private $counter_all;
	
	public function __construct(){
	    $this->create_table();
		$this->add_date($this->see_now());
		$this->add_value($this->set_ip());
	}
	
    private function create_table(){
        @mysql_query("CREATE TABLE IF NOT EXISTS ".$this->table." (`tgl` DATE NOT NULL ,`value` LONGTEXT NOT NULL ,PRIMARY KEY (  `tgl` )) ENGINE = MYISAM ;");
    }
    
	public function get_counter(){
		// Begin All
		$sVAll = @mysql_query("SELECT * FROM ".$this->table."");
		$c=0;
		while($aVAll = @mysql_fetch_array($sVAll)){
    		$eVAll = explode('|',$aVAll['value']);
    		$c+=count($eVAll);
		}
		$this->counter_all = $c;
		// End All
        
		// Begin Today
		$sVAll = @mysql_query("SELECT * FROM ".$this->table." WHERE `tgl` = CURDATE()");
		$c=0;
		while($aVAll = @mysql_fetch_array($sVAll)){
    		$eVAll = explode('|',$aVAll['value']);
    		$c+=count($eVAll);
		}
		$this->counter_today = $c;
		// End Today
		
        /*
        // Begin Week
		$x=0;
		for($i=date('N');$i>=1;$i--){
			$x+=1;
		}
		$y=0;
		for($i=date('N');$i<=7;$i++){
			$y+=1;
		}
		$x=(date('j')-$x);
		$y=(date('j')+$y);
		$c=0;
		$sVAll = @mysql_query("SELECT * FROM ".$this->table."");
		while($aVAll = @mysql_fetch_array($sVAll)){
		if(strlen($aVAll['tgl'])==7){
			$wd = substr($aVAll['tgl'],0,1);
			$mon = substr($aVAll['tgl'],1,2);
			$year = substr($aVAll['tgl'],3,4);
		}
		if(strlen($aVAll['tgl'])==8){
			$wd = substr($aVAll['tgl'],0,2);
			$mon = substr($aVAll['tgl'],2,2);
			$year = substr($aVAll['tgl'],4,4);
		}
			if(($mon == date('m') and $year == date('Y')) and ($wd>intval($x) and $wd<intval($y))){
				$eVAll = explode('|',$aVAll['value']);
				$c+=count($eVAll);
			}
		}
		$this->sumCounterWeek = $c;
		// End Week
		// Begin Month
		$sVAll = @mysql_query("SELECT * FROM ".$this->table."");
		$c=0;
		while($aVAll = @mysql_fetch_array($sVAll)){
		if(strlen($aVAll['tgl'])==7){
			$mon = substr($aVAll['tgl'],1,2);
		}
		if(strlen($aVAll['tgl'])==8){
			$mon = substr($aVAll['tgl'],2,2);
		}
			if($mon==date('m')){
				$eVAll = explode('|',$aVAll['value']);
				$c+=count($eVAll);
			}
		}
		$this->sumCounterMonth=$c;
		// End Month
		// Begin Year
		$sVAll = @mysql_query("SELECT * FROM ".$this->table."");
		$c=0;
		while($aVAll = @mysql_fetch_array($sVAll)){
		if(strlen($aVAll['tgl'])==7){
			$yr = substr($aVAll['tgl'],3,4);
		}
		if(strlen($aVAll['tgl'])==8){
			$yr = substr($aVAll['tgl'],4,4);
		}
			if($yr==date('Y')){
				$eVAll = explode('|',$aVAll['value']);
				$c+=count($eVAll);
			}
		}
		$this->sumCounterYear=$c;
		// End Year
        */
        
		return array(
					"ip"=>$this->set_ip(),
					"today"=>$this->counter_today,
					/*"week"=>$this->sumCounterWeek,
					"month"=>$this->sumCounterMonth,
					"year"=>$this->sumCounterYear,*/
					"all"=>$this->counter_all,
					0=>$this->counter_today,
					/*1=>$this->sumCounterWeek,
					2=>$this->sumCounterMonth,
					3=>$this->sumCounterYear,*/
					1=>$this->counter_all
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
		$seeNow = @mysql_query("SELECT * FROM ".$this->table." WHERE `tgl` = CURDATE()");
		$sumNow = @mysql_num_rows($seeNow);
		$r = true;
		if($sumNow>=1){
			$r = false;
		}
		return $r;
	}
	private function add_date($seeNowState){
		if($seeNowState){
			$add = @mysql_query("INSERT INTO ".$this->table."(tgl) VALUES(CURDATE())");
		}
	}
	private function add_value($ip){
		$seeValue = @mysql_query("SELECT * FROM ".$this->table." WHERE `tgl` = CURDATE()");
		$aSeeValue = @mysql_fetch_array($seeValue);
		if($aSeeValue['value']!=''){
			$eValue = explode('|',$aSeeValue['value']);
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
					/*$update = */@mysql_query("UPDATE ".$this->table." SET `value` = '".$v."' WHERE `tgl` = CURDATE() LIMIT 1");
				}
			}
			else{
				$v=$eValue[0].'|'.$ip;
				@mysql_query("UPDATE ".$this->table." SET `value` = '".$v."' WHERE `tgl` = CURDATE() LIMIT 1");
			}
		}
		else{
			@mysql_query("UPDATE ".$this->table." SET `value` = '".$ip."' WHERE `tgl` = CURDATE() LIMIT 1");
		}
	}
}

/* End of file Counter.php */
/* Location: ./application/libraries/Counter.php */