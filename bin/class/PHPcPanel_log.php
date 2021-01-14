<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/
function PHPcPanel_log($str){
	global $if_log;
	if ($if_show_msg==true) {		
		$str=PHPcPanel_TSF($str);
	}	
}

?>