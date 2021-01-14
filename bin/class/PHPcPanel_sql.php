<?php
/*************************************************************
                PHPcPanel         
This interface file can called by owner to manage sql throug POST method.
not finished yeat!
Last modification 2012/12/28
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com 
**************************************************************/

/*user can define user POST parameters here*/
$PHPcPanel_t=$_REQUEST["S"];
$PHPcPanel_a=$_POST["a"];
$PHPcPanel_b=$_POST["b"];
$PHPcPanel_c=$_POST["c"];
$PHPcPanel_d=$_POST["d"];
$PHPcPanel_e=$_POST["e"];

if(strlen(trim($PHPcPanel_t))>0){//demo of sql function
	include_once('../../PHPcPanel.php');
	if(PHPcPanel_load_config()==true) include('../VAR.php');
	if(PHPcPanel_login()==true){// after set system by using  http://your_domain.com/PHPcPanel/install/
		if($PHPcPanel_t== 0 ){echo "SQL Test OK" ;}
		elseif($PHPcPanel_t== 1 ){PHPcPanel_chk_db($PHPcPanel_a,$PHPcPanel_b,$PHPcPanel_c,$PHPcPanel_d,$PHPcPanel_e);}
		else{echo "S.Parameters Not Match" ;}		
	}else{
		echo "Login Test Failed" ;
	}		
}

/*user can define your own functions here*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
		
?>