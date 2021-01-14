<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/

function reboot_system(){
	global $cfg_root,$cfg_path,$cfg_path2;

	if( file_exists(dirname(__FILE__).$cfg_path) ){
		unlink(dirname(__FILE__).$cfg_path);
	}
	copy(dirname(  __FILE__).$cfg_path2 ,  dirname(__FILE__).$cfg_path  );
	return true;
	//echo("<script type='text/javascript'> alert('Reboot OK. Please goto config system');</script>");
}

function get_config_information(){
	global $cfg_path,$svr_host,$svr_port,$svr_pass,$svr_user,$svr_document_root,$svr_email;
	
	$config_file_uri=dirname(__FILE__).$cfg_path;
	
	//echo  $config_file_uri;

	if(file_exists($config_file_uri))
	{
		$file = fopen($config_file_uri, "r");
		$i=0;
		while(!feof($file)) 
		 { 		 	
			$x= trim(fgets($file)); 
			if(strlen($x)==0)continue;
			$y= explode(":=",$x);
			//echo base64_decode($y[0])."=".base64_decode($y[1])."<br>";
			$m=base64_decode($y[0]);
			$k=base64_decode($y[1]);
			
			if($m=='$svr_host'){
				$svr_host=$k;
			}elseif ($m=='$svr_port'){
				$svr_port=$k;
			}elseif ($m=='$svr_user'){
				$svr_user=$k;
			}elseif ($m=='$svr_pass'){
				$svr_pass=$k;
			}elseif ($m=='$svr_document_root'){
				$svr_document_root=$k;
			}elseif ($m=='$svr_email'){
				$svr_email=$k;
			}elseif ($m=='$PHPcPanel_version'){
				//$PHPcPanel_version=$k;
			}
			
		 }
		fclose($file);
	}else{
		
		reboot_system();
		echo ("<script type='text/javascript'> alert('ERROR in reading config file. Please goto ./PHPcPanel/install/index.php to config system.');</script>");
		die("ERROR in reading config file. Please goto ./PHPcPanel/install/index.php to config system.");
	}
}

function PHPcPanel_load_config(){
	global $svr_user;
	
	get_config_information();	
	
	if (strlen($svr_user)>0) {
		return true;
	}else{
		return false;
	}
}

function save_config(){
	global $svr_host,$svr_port,$svr_user,$svr_pass,$svr_document_root,$svr_email,$a,$cfg_path;
	
	$config_file_uri=dirname(__FILE__).$cfg_path;
	
	$result=false;
	
	if(file_exists($config_file_uri))
	{
		if (reboot_system()==true) {
			$str  ="\r\n".base64_encode('$svr_host').":=".base64_encode($svr_host)."\r\n";
			$str .=base64_encode('$svr_port').":=".base64_encode($svr_port)."\r\n";
			$str .=base64_encode('$svr_user').":=".base64_encode($svr_user)."\r\n";
			$str .=base64_encode('$svr_pass').":=".base64_encode($svr_pass)."\r\n";
			$str .=base64_encode('$svr_document_root').":=".base64_encode($svr_document_root)."\r\n";
			$str .=base64_encode('$svr_email').":=".base64_encode($svr_email)."\r\n";
			$str .=base64_encode('$PHPcPane_root').":=".base64_encode($a);

			$file = fopen($config_file_uri, "a+");
			fwrite($file,$str);
			fclose($file);	
			get_latest_version_number("0");		
			$result=true;						
		}else{
			send_error("reboot_system");
			echo ("ERROR in reading config file! Please goto http://www.ushops.net/phpcpanel/index.php to get latest version.");
		}
	}else{
		echo("<script type='text/javascript'> alert('Config File Not Find. Please goto http://www.ushops.net/phpcpanel/index.php to get latest version.');</script>");
		send_error("sv_cfg_fil_not_fnd");
		echo ('Config File Not Find. Please goto http://www.ushops.net/phpcpanel/index.php to get latest version.');
	}
	
	return $result;
	
}

function get_svr_host(){
	global $svr_host;
	return $svr_host;
}


function get_svr_port(){
	global $svr_port;
	return $svr_port;
}

function get_svr_user(){
	global $svr_user;
	get_config_information();
	return $svr_user;
}

function get_svr_pass(){
	global $svr_pass;
	return $svr_pass;
}

function get_svr_email(){
	global $svr_email;
	return $svr_email;
}

function get_svr_document_root(){
	global $svr_document_root;
	return $svr_document_root;
}

?>