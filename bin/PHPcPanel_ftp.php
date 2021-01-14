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
function  add_ftp_account($ftp_login_name, $ftp_password, $ftp_directory , $quota){
	
	global $cpanel_new_ftp_post_addr,$svr_document_root;
	
	$cpanel_new_ftp_post_addr .="?login=$ftp_login_name&password=$ftp_password&homedir=$svr_document_root$ftp_directory&quota=$quota";
	
	//echo $cpanel_new_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_new_ftp_post_addr);
	if ($res == true) {
		PHPcPanel_log("create ftp account '$ftp_login_name' ok");
		PHPcPanel_msg("create ftp account '$ftp_login_name' ok");		
		return true;
	}else{
		PHPcPanel_log("create ftp account '$ftp_login_name' Failed");
		PHPcPanel_msg("create ftp account '$ftp_login_name' Failed");		
		return false;		
	}
	
}

function  delete_ftp_account($ftp_login_name){
	
	global $cpanel_delete_ftp_post_addr;
	
	$cpanel_delete_ftp_post_addr .="?login=$ftp_login_name";
	
	//echo $cpanel_delete_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_delete_ftp_post_addr);
	if ($res == true) {
		PHPcPanel_log("delete ftp account '$ftp_login_name' ok");
		PHPcPanel_msg("delete ftp account '$ftp_login_name' ok");		
		return true;
	}else{
		PHPcPanel_log("delete ftp account '$ftp_login_name' Failed");
		PHPcPanel_msg("delete ftp account '$ftp_login_name' Failed");		
		return false;		
	}
	
}

function edit_quota_ftp_account($ftp_login_name,$new_quota){
	
	global $cpanel_edit_quota_ftp_post_addr;
	
	$cpanel_edit_quota_ftp_post_addr .="?acct=$ftp_login_name&quota=$new_quota";
	
	//echo $cpanel_edit_quota_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_edit_quota_ftp_post_addr);
	if ($res == true) {
		PHPcPanel_log("edit quota to $new_quota for ftp account '$ftp_login_name' ok");
		PHPcPanel_msg("edit quota to $new_quota for ftp account '$ftp_login_name' ok");		
		return true;
	}else{
		PHPcPanel_log("edit quota to $new_quota for ftp account '$ftp_login_name' Failed");
		PHPcPanel_msg("edit quota to $new_quota for ftp account '$ftp_login_name' Failed");		
		return false;		
	}
	
}

function change_ftp_password($ftp_login_name,$new_password){
	
	global $cpanel_change_ftp_password_post_addr;
	
	$cpanel_change_ftp_password_post_addr .="?acct=$ftp_login_name&password=$new_password&password2=$new_password";
	
	//echo $cpanel_edit_quota_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_change_ftp_password_post_addr);
	if ($res == true) {
		PHPcPanel_log("change password to $new_password for ftp account '$ftp_login_name' ok");
		PHPcPanel_msg("change password to $new_password for ftp account '$ftp_login_name' ok");		
		return true;
	}else{
		PHPcPanel_log("change password to $new_password for ftp account '$ftp_login_name' Failed");
		PHPcPanel_msg("change password to $new_password for ftp account '$ftp_login_name' Failed");		
		return false;		
	}
	
}

?>