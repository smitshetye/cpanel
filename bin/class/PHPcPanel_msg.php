<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/
function PHPcPanel_msg($str){
	global $if_show_msg;
	if ($if_show_msg==true) {		
		$str=PHPcPanel_TSF($str);
		echo ("<script type='text/javascript'> alert('$str');</script>");
	}
}

?>