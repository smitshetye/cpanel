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
function add_floder($floder_uri){
	global $svr_document_root;
	
	$floder_uri=$svr_document_root.$floder_uri;
	
	//echo "1";
	if (is_readable($floder_uri)==true) {
		PHPcPanel_log("Floder $floder_uri already existed!");
		//PHPcPanel_msg("Floder $floder_uri already existed!");
		//echo "2";
		return false;
	}else{
		if (mkdir($floder_uri)) {
			PHPcPanel_log("mkdir $floder_uri ok.");
			//PHPcPanel_msg("create floder ok");
			//echo "3";
			return true;
		}else{
			PHPcPanel_log("mkdir $floder_uri failed.");
			//echo "4";
			return false;
		}		
	}
}

function delete_floder($floder_uri){
	global $svr_document_root;
	
	$floder_uri=$svr_document_root.$floder_uri;
	
	//echo "1";
	if (is_readable($floder_uri)==true) {
			remove_directory($floder_uri);
			PHPcPanel_log("remove $floder_uri ok");
			PHPcPanel_msg("remove $floder_uri ok");
			return true;
	}else{		
		PHPcPanel_log("Floder $floder_uri not existed! remove dir failed");
		return false;		
	}
}

?>