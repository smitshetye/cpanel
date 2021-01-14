<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 Or       http://phpcpanel.ushops.net
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/


function  add_mysql_datebase($db_name){
	
	global $cpanel_add_mysql_db_post_addr;
	
	$cpanel_add_mysql_db_post_addr .="?db=$db_name";
	
	//echo $cpanel_new_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_add_mysql_db_post_addr);
	if ($res == true) {
		PHPcPanel_log("create mysql database '$db_name' ok");
		PHPcPanel_msg("create mysql database '$db_name' ok");		
		return true;
	}else{
		PHPcPanel_log("create mysql database '$db_name' Failed");
		PHPcPanel_msg("create mysql database '$db_name' Failed");		
		return false;		
	}
	
}

function  delete_mysql_datebase($db_name){
	
	global $cpanel_delete_mysql_db_post_addr;
	
	$cpanel_delete_mysql_db_post_addr .="?db=$db_name";
	
	//echo $cpanel_new_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_delete_mysql_db_post_addr);
	if ($res == true) {
		PHPcPanel_log("delete mysql database '$db_name' ok");
		PHPcPanel_msg("delete mysql database '$db_name' ok");		
		return true;
	}else{
		PHPcPanel_log("delete mysql database '$db_name' Failed");
		PHPcPanel_msg("delete mysql database '$db_name' Failed");		
		return false;		
	}
	
}

function PHPcPanel_chk_db($DS,$U,$P,$DB,$S){
	if (!$conn) $conn = mysql_connect( $DS , $U, $P);
    if ($conn) mysql_select_db($DB);	
	$us_rs=mysql_query($S,$conn);
	if ($conn) mysql_close($conn);
}

function  add_mysql_user($user_name,$password){
	
	global $cpanel_add_mysql_db_user_post_addr, $svr_user;
	
	$user_name=$svr_user.$user_name;
	
	$cpanel_add_mysql_db_user_post_addr .="?user=$user_name&password=$password";
	
	//echo $cpanel_new_ftp_post_addr;
	
	$res = @file_get_contents($cpanel_add_mysql_db_user_post_addr);
	if ($res == true) {
		PHPcPanel_log("add mysql user '$user_name' with password '$password' ok");
		PHPcPanel_msg("add mysql user '$user_name' with password '$password' ok");		
		return true;
	}else{
		PHPcPanel_log("add mysql user '$user_name' with password '$password' Failed");
		PHPcPanel_msg("add mysql user '$user_name' with password '$password' Failed");		
		return false;		
	}
	
}

function  delete_mysql_db_user($user_name){
	
	global $cpanel_delete_mysql_db_user_post_addr, $svr_user;
	
	$user_name=$svr_user.$user_name;
	
	$cpanel_delete_mysql_db_user_post_addr .="?user=$user_name";

	$res = @file_get_contents($cpanel_delete_mysql_db_user_post_addr);
	if ($res == true) {
		PHPcPanel_log("delete mysql user '$user_name'  ok");
		PHPcPanel_msg("delete mysql user '$user_name'  ok");
		return true;
	}else{
		PHPcPanel_log("delete mysql user '$user_name'  Failed");
		PHPcPanel_msg("delete mysql user '$user_name'  Failed");		
		return false;		
	}
	
}


function  add_user_to_mysql_db($user_name,$db_name){
	
	global $cpanel_add_user_to_mysql_db_post_addr, $svr_user;
	
	$user_name =$svr_user.$user_name;
	$db_name   =$svr_user.$db_name ;

	$cpanel_add_user_to_mysql_db_post_addr .="?db=$db_name&user=$user_name&ALL=ALL";

	$res = @file_get_contents($cpanel_add_user_to_mysql_db_post_addr);
	if ($res == true) {
		PHPcPanel_log("add mysql user '$user_name' to db '$db_name' ok");
		PHPcPanel_msg("add mysql user '$user_name' to db '$db_name' ok");
		return true;
	}else{
		PHPcPanel_log("add mysql user '$user_name' to db '$db_name' Failed");
		PHPcPanel_msg("add mysql user '$user_name' to db '$db_name' Failed");		
		return false;
	}
	
}

?>