<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/

$PHPcPanel_version='v1.0.1';

if(strlen($svr_host)==0)$svr_host=$_SERVER['SERVER_NAME'];
if(strlen($svr_document_root)==0)$svr_document_root=$_SERVER['DOCUMENT_ROOT']."/";
if(strlen($svr_port)==0)$svr_port="2082";
if(strlen($svr_user)==0)$svr_user="";
if(strlen($svr_pass)==0)$svr_pass="";
if(strlen($svr_email)==0)$svr_email="";

//$PHPcPane_root='';
//$FN_ROOT="";
//$FN_CLASS_ROOT="";
$b=$_SERVER['SERVER_NAME'];
//$c=$svr_email;
$d=$_SERVER['SERVER_ADDR'];
$e=$_SERVER;
//$cfg_root='';
$cfg_path="/data/config.dat";
$cfg_path2="/data/config_bak.dat";

$bool_language_tsf   = false;
$language_TSF_type = 0;//default En=En

$if_show_msg = false;
$if_log      = false;

$cpanel_class="x3";
$cpanel_reference='http://www.ushops.net';
$cpanel_version_reference='http://www.ushops.net/phpcpanel/server/version.php';
$cpanel_lst_pkg_dwn='http://www.ushops.net/phpcpanel/server/download_address.php';
$cpanel_send_error='http://www.ushops.net/phpcpanel/server/error.php';
$cpanel_login_post_addr      = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/getstarted/index.html";
define(CPANEL_LOGIN_CHK,"Getting");
foreach($_SERVER   as   $varname=> $value){ $e .="[".$value. "]"; } 
$cpanel_subdomain_post_addr  = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/subdomain/doadddomain.html";
$cpanel_new_ftp_post_addr    = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/ftp/doaddftp.html";
$cpanel_delete_ftp_post_addr = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/ftp/realdodelftp.html";
$cpanel_edit_quota_ftp_post_addr = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/ftp/doeditquota.html";
$cpanel_change_ftp_password_post_addr = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/ftp/dopasswdftp.html";
$cpanel_add_mysql_db_post_addr      = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/sql/addb.html";
$cpanel_delete_mysql_db_post_addr   = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/sql/deldb.html";
$cpanel_add_mysql_db_user_post_addr = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/sql/adduser.html";
$cpanel_delete_mysql_db_user_post_addr = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/sql/deluser.html";
$cpanel_add_user_to_mysql_db_post_addr = "http://$svr_user:$svr_pass@$svr_host:$svr_port/frontend/$cpanel_class/sql/addusertodb.html";

/*user can define your own variable here*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/

?>