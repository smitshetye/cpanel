<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/


/*
to new a floder. The current floder is phpcpanel, 
your root floder of website may be: public_html/
therefore new floder $floder_url should be: public_html/abc/your_floder_name
*/
function add_subdomain($subdomain_name,$path){
	global $cpanel_subdomain_post_addr,$svr_document_root;
	
	$cpanel_subdomain_post_addr .="?domain=$subdomain_name&rootdomain=$svr_host&dir=$svr_document_root$path&go=Create";
	
	//echo $cpanel_subdomain_post_addr;
	
	$res = @file_get_contents($cpanel_subdomain_post_addr);
	if ($res == true) {
		PHPcPanel_log("create subdomain '$subdomain_name' ok");
		//PHPcPanel_msg("create subdomain '$subdomain_name' ok");		
		return true;
	}else{
		PHPcPanel_log("create subdomain '$subdomain_name' Failed");
		//PHPcPanel_msg("create subdomain '$subdomain_name' Failed");		
		return false;		
	}
	
}

?>