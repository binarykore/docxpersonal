<?php
class year{
	public static function feed($_date){
		$_year = [];
		$_currentyear = date("Y");
		$_startingyear = $_date;
		$_timespan = abs($_startingyear - $_currentyear);
		for($_i = 0;$_i <= $_timespan;$_i++){
			$_yearStamp = ($_startingyear + $_i);
			$_year[$_i] = ($_yearStamp);
		}
		return(json_encode($_year));
	}
}//
?>