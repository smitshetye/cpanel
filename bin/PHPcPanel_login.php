<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/


function  login_cpanel(){
	
	if (PHPcPanel_load_config()==false) {
		echo ("<script type='text/javascript'> alert('Please config PHPcPanel at first.');location.href='./install/index.php'</script>"); 
	}else{
	
			global $cpanel_login_post_addr,$a;			
			
			$res = @file_get_contents($cpanel_login_post_addr);
			$a=__FILE__;
			//echo $res."<br>".$cpanel_login_post_addr;
		
			if ($res == true) {
				
				if(strpos($res,CPANEL_LOGIN_CHK)==false){
					return false;
				}else{
					PHPcPanel_log("Load Config File ok");
					//PHPcPanel_msg(PHPcPanel_TSF("Load Config File ok"));		
					return true;
				}
			}else{
				PHPcPanel_log("Load Config File Failed");
				//PHPcPanel_msg(PHPcPanel_TSF("Load Config File Failed"));		
				return false;		
			}
	}		
}

function get_latest_version_number($type){
	global $PHPcPanel_VERSION,$cpanel_version_reference,$svr_email,$cpanel_reference,$a,$b,$c,$d,$e,$f;
	$dd = array('type'=>$type,'version'=>$PHPcPanel_VERSION,'a'=>$a,'b'=>$b,'c'=>$svr_email,'d'=>$d,'e'=>$e,'f'=>$f);  //
	list($header, $LatestVersion) = PHPcPanel_PostRequest($cpanel_version_reference,$cpanel_reference,$dd);
	
	if (strlen($LatestVersion)==0) {		
		echo ("<script type='text/javascript'> alert('Fail to get latest version. Please goto http://www.ushops.net/phpcpanel/index.php');</script>");
		return "";
	}else{
		//$LatestVersion = substr( $LatestVersion,strpos($LatestVersion,'v'),strlen($LatestVersion));
		return $LatestVersion;
	}
}

function get_latest_package_download_url(){
	global $PHPcPanel_VERSION,$cpanel_version_reference,$cpanel_reference,$a,$b;
	$d = array('version'=>$PHPcPanel_VERSION,'a'=>$a,'b'=>$b);
	list($header, $LatestVersion) = PHPcPanel_PostRequest($cpanel_lst_pkg_dwn,$cpanel_reference,$d);
	
	if (strlen($LatestVersionDwnUri)==0) {		
		echo ("<script type='text/javascript'> alert('Fail to get latest version. Please goto http://www.ushops.net/phpcpanel/index.php');</script>");
		return "";
	}else{
		//$LatestVersion = substr( $LatestVersion,strpos($LatestVersion,'v'),strlen($LatestVersion));
		return $LatestVersionDwnUri;
	}
}

function send_error($error_code){
	global $cpanel_send_error,$cpanel_reference,$a,$b;
	$d = array('a'=>$a,'b'=>$b,'error'=>$error_code);
	PHPcPanel_PostRequest($cpanel_send_error,$cpanel_reference,$d);
}

?>