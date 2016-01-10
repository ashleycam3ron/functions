<?php
# Flatted Array
function flatten($array,$return=array()){
	foreach($array as $k=>$v){
		if(is_array($v)){
			$return = flatten($v,$return);
		}else{
			if($v){
				$return[] = $v;
			}
		}
	}
	return $return;
}
?>