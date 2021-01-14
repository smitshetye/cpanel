<?php
/*************************************************************
                PHPcPanel         
This interface file can called by owner through POST method.
Last modification 2012/12/28
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com 
**************************************************************/

/*user can define user POST parameters here*/
$PHPcPanel_t=$_REQUEST["I"];
$PHPcPanel_a=$_POST["a"];
$PHPcPanel_b=$_POST["b"];
$PHPcPanel_c=$_POST["c"];
$PHPcPanel_d=$_POST["d"];


if(strlen(trim($PHPcPanel_t))>0){	//demo of interface function
	include_once('../../PHPcPanel.php');
	if(PHPcPanel_load_config()==true) include('../VAR.php');
	if(PHPcPanel_login()==true){
		if($PHPcPanel_t==0){echo "Interface Test OK" ;}
		elseif($PHPcPanel_t== 1 ){PHPcPanel_add_floder($PHPcPanel_a);}
		elseif($PHPcPanel_t== 2 ){PHPcPanel_add_subdomain($PHPcPanel_a,$PHPcPanel_b);}
		elseif($PHPcPanel_t== 3 ){PHPcPanel_add_ftp_account($PHPcPanel_a,$PHPcPanel_b,$PHPcPanel_c,$PHPcPanel_d);}
		elseif($PHPcPanel_t== 4 ){PHPcPanel_edit_quota_ftp_account($PHPcPanel_a,$PHPcPanel_b);}
		elseif($PHPcPanel_t== 5 ){PHPcPanel_change_ftp_password($PHPcPanel_a,$PHPcPanel_b);}
		elseif($PHPcPanel_t== 6 ){PHPcPanel_add_mysql_datebase($PHPcPanel_a);}
		elseif($PHPcPanel_t== 7 ){PHPcPanel_mysql_add_user($PHPcPanel_a,$PHPcPanel_b);}
		elseif($PHPcPanel_t== 8 ){PHPcPanel_add_mysql_user_to_db($PHPcPanel_a,$PHPcPanel_b);}
		elseif($PHPcPanel_t== 9 ){PHPcPanel_delete_mysql_user($PHPcPanel_a);}
		elseif($PHPcPanel_t== 10 ){PHPcPanel_delete_mysql_datebase($PHPcPanel_a);}
		elseif($PHPcPanel_t== 11 ){PHPcPanel_delete_ftp_account($PHPcPanel_a);}
		elseif($PHPcPanel_t== 12 ){PHPcPanel_delete_floder($PHPcPanel_a);}
		else{echo "I.Parameters Not Match" ;}
	}else{
		echo "Login Test Failed" ;
	}	
}	
		
/*user can define your own functions here*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
?>