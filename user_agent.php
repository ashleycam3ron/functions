<?php
class HUA{
	public $type;
	public $version;
	public $platform;
	function __construct(){
		global $db;
		$hua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$browsers = array('firefox','msie','opera','chrome','safari','mozilla','seamonkey','konqueror','netscape','gecko','navigator','mosaic','lynx','amaya','omniweb','avant','camino','flock','aol');
		foreach($browsers as $b){
			if(preg_match("#($b)[/ ]?([0-9.]*)#", $hua, $match)){
				$this->type = $match[1];
				$this->version = $match[2];
                break;
			}
		}
		$platforms = array('android','ipod','blackberry','iphone','win','mac','ppc','linux','os/2','beos');
		foreach($platforms as $p){
			if(preg_match("($p)", $hua, $match)){
				$this->platform = $p;
                break;
			}
		}
	}
}
$agent = new HUA();
?>