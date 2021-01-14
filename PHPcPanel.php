<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/

$PHPcPanel_VERSION="v1.0.2";

$FN_ROOT=dirname(__FILE__);
$cfg_root=$FN_ROOT;
$a=$FN_ROOT;

include_once($FN_ROOT.'/bin/INCLUDE.php');

/*
before use PHPcPanel, you have config PHPcPanel at './PHPcPanel/install/index.php'
*/
function PHPcPanel_check_if_already_config_system(){
	if( PHPcPanel_load_config() ){
		return true;
	}else{
		return false;
	}
}

function PHPcPanel_get_PHPcPanel_latest_version_number($type){
	$latest_verstion=get_latest_version_number($type);
	return  $latest_verstion;
}

/*
function: automatically login cpanel though post method
response: TRUE login successfully
*/
function PHPcPanel_login()
{
	if ( login_cpanel()==true) {
		return true;
	}else{
		return false;
	}
}

/*
to new a floder. The current floder is ./phpcpanel, 
If your document root is  /home/public_html/
then, the new floder $floder_url should only be your_floder_name without home/public_html/
*/
function PHPcPanel_add_floder($floder_uri)////the given parameter should be '123/' without '/home/public_html/'
{	
	if( add_floder($floder_uri)){
		return true;
	}else{
		return false;
	}	
}

/*
to delete a floder. The current floder is ./phpcpanel, 
If your document root is  /home/public_html/
then, the floder $floder_url should only be your_floder_name without home/public_html/
*/
function PHPcPanel_delete_floder($floder_uri)////the given parameter should be '123/' without '/home/public_html/'
{	
	if( delete_floder($floder_uri)){
		return true;
	}else{
		return false;
	}	
}

/*
to open a new ftp account.
$ftp_login_name do not include suffix such as @unionshops.net
$ftp_directory should be like this: public_html/abc/xyz/your_floder_name/
$quota is a number do not include MB, such as: 100, if you use 0 then is means unlimited.
*/
function PHPcPanel_add_ftp_account($ftp_login_name, $ftp_password, $ftp_directory , $quota)
{
	if( add_ftp_account($ftp_login_name, $ftp_password, $ftp_directory , $quota)){
		return true;
	}else{
		return false;
	}
}

/*
to delete ftp account and leave its floder remain
*/
function PHPcPanel_delete_ftp_account($ftp_login_name){
	if( delete_ftp_account($ftp_login_name)){
		return true;
	}else{
		return false;
	}
}

/*
to delete ftp account and leave its floder remain
*/
function PHPcPanel_edit_quota_ftp_account($ftp_login_name,$quota){
	if( edit_quota_ftp_account($ftp_login_name,$quota)){
		return true;
	}else{
		return false;
	}
}

/*
to delete ftp account and leave its floder remain
*/
function PHPcPanel_change_ftp_password($ftp_login_name,$new_password){
	if( change_ftp_password($ftp_login_name,$new_password)){
		return true;
	}else{
		return false;
	}
}

/*
to open a new subdomain.
$subdomain do not include suffix such as .yahoo.com, just use abc is ok.
$directory should be : (public_html/)   your_father_floder/your_floder_name     without "/home/publc_html/".
*/
function PHPcPanel_add_subdomain($sub_domain, $directory){
	if(add_subdomain($sub_domain, $directory)){
		return true;
	}else{
		return false;
	}
}


/*
to add a new mysql datebase.
$datebase_name should like abc, and do not include suffix such as unishops_
*/
function PHPcPanel_add_mysql_datebase($datebase_name){
	if(add_mysql_datebase($datebase_name)){
		return true;
	}else{
		return false;
	}
}


/*
to delete a mysql datebase.
$datebase_name should like test_db_name, and do not include suffix such as unishops_
*/
function PHPcPanel_delete_mysql_datebase($datebase_name){
	if(delete_mysql_datebase($datebase_name)){
		return true;
	}else{
		return false;
	}
}


/*
to add a new mysql user.
$user_name should like test_user, and do not include suffix such as unishops_
$password is shorter than 7
*/
function PHPcPanel_mysql_add_user($user_name,$password){
	if(add_mysql_user($user_name,$password)){
		return true;
	}else{
		return false;
	}
}

/*
to delete a new mysql user.
$user_name should like test_user, and do not include suffix such as unishops_
$password is shorter than 7
*/
function PHPcPanel_delete_mysql_user($user_name){
	if(delete_mysql_db_user($user_name)){
		return true;
	}else{
		return false;
	}
}

/*
to open a new mysql user.
$datebase_name do not include suffix such as @yahoo.com, just use abc is ok.
$user_name has right to use the $datebase_name
$type: 0-all  1-[select] 2-[1+insert,update] 3-[2+create table]
*/
function PHPcPanel_add_mysql_user_to_db($user_name,$db_name){
	if(add_user_to_mysql_db($user_name,$db_name)){
		return true;
	}else{
		return false;
	}
}

/*user can define your own functions here*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/

?>