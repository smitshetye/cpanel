<?php 
	include_once("PHPcPanel.php");
	
	if (PHPcPanel_load_config()==false) {
		echo ("<script type='text/javascript'> alert('Please config PHPcPanel at first.');location.href='./install/index.php'</script>"); 
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="PHP for manage cpanel" />
<meta name="description" content="a tool used to manage cpanel without manually login" />
<title>Demo of PHPcPanel</title>
<style type="text/css">
<!--
.title {	text-decoration: none;
}
.aa {
	color: #0F0;
}
.b {
	color: #F00;
}
.aa {
	font-weight: bold;
}
-->
</style>
<body>
<h2><strong>DEMO of &nbsp; <a href="http://www.ushops.net/phpcpanel/" class="title" target="_blank">PHPcPanel</a></strong></h2>
<p><a href="doc/index.html">Documents &gt;&gt;</a></p>
<p><strong><font color="Red" size="3"><a href="install/index.php">Go to install/config  PHPcPanel  &gt;&gt;</a></font></strong></p>
<p>PHPcPanel is a php opensource tool used to manage FTP/Email/Sub-domain/Mysql of cPanel without requiring manually login cpanel. </p>
<p><strong><font color="Red" size="3"> <a href="install/index.php">Go To Install/Config  PHPcPanel &gt;&gt;</a></font></strong></p>

<table size=2 border="1">

  <tr align="right"><td>Host:</td><td align="left">&nbsp;<?php echo get_svr_host();?></td></tr>
  <tr align="right"><td>Port:</td><td align="left">&nbsp;<?php echo get_svr_port();?></td></tr>  
  <tr align="right"><td>Login User:</td><td align="left">&nbsp;<?php echo get_svr_user();?></td></tr>
  <tr align="right"><td>Login Password:</td><td align="left">&nbsp;<?php echo md5(get_svr_pass());?></td></tr>
  <tr align="right"><td>Document Root:</td><td align="left">&nbsp;<?php echo get_svr_document_root();?></td></tr>
  <tr align="right"><td>Contact Email:</td><td align="left">&nbsp;<?php echo get_svr_email(); ?></td></tr>  

</table>
<p><span class="bodytext"><font color="#FF0000" size="3">a) Don't forget to &quot;include(./PHPcPanel.php)&quot;<br />
b) </font></span><span style="font: 0.7em Tahoma, sans-serif"><font color="#FF0000" size="3">M</font></span><span class="bodytext"><font color="#FF0000" size="3">ake sure floder <font color="#0066FF">./PHPcPanel/bin/data/</font> is writable 777<br />
c) </font></span><span style="font: 0.7em Tahoma, sans-serif"><font color="#FF0000" size="3">A</font></span><span class="bodytext"><font color="#FF0000" size="3">fter successful install, delete file ./PHPcPanel/install/index.php</font></span></p>
<p><strong><font color="black">After Install/Config</font></strong></p>
<p><strong><font color="Red">TEST REPORT of PHPcPanel </font></strong></p>
<p>After finishing config your host for PHPcPanel. The following report shows that PHPcPanel can work well or not?</p>
<p class="aa"><span class="aa"><a href="install/index.php">Config PHPcPanel</a> <span class="b">--&gt;</span> Automatically Login cPanel  <span class="b">--&gt;</span> create a Floder  <span class="b">--&gt;</span> create  subdomain  <span class="b">--&gt;</span> create FTP account</span></p>
<p class="aa"> <span class="aa"><span class="b">--&gt;</span> Edit quota of FTP account <span class="b">--&gt;</span> Change password of FTP account  <span class="b">--&gt;</span> Create Mysql account  <span class="b">--&gt;</span>Add user to Mysql database</span></p>
<p class="aa"> <span class="aa"><span class="b">--&gt;</span> delete FTP account <span class="b">--&gt;</span> delete Mysql account <span class="b">--&gt;</span> delete the created floder</span></p>

<p>
  <?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/

include_once("PHPcPanel.php");

echo "Test report of PHPcPanel <br>";
echo "<table border=1><tr><td align>Test</td><td>Result</td></tr>";

if (PHPcPanel_load_config()==true) {//load config information

	include("./bin/VAR.php");//load parameters, and refresh parameters, don't forget!

		if(PHPcPanel_login()==true){// after set system by using  http://your_domain.com/PHPcPanel/install/
			
			//has been login sucess
			$command="<font size=2 color=blue>"."PHPcPanel_login()"."</font><br>";
			echo "<tr><td>$command login test </td><td><font size=3 color=green><strong>OK</strong></font></td></tr>";
			
			// to create a floder located at /home/public_html/123/
			$command="<font size=2 color=blue>"."PHPcPanel_add_floder('123/')"."</font><br>";
			if(PHPcPanel_add_floder("123/")){ //the given parameter should be '123/' without '/home/public_html/'
				echo "<tr><td>$command create floder 'public_html/123/' </td><td><font size=3 color=green><strong>OK</strong></font></td></tr>";
			}else{
				echo "<tr><td>$command create floder 'public_html/123/' </td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}
			
			// to create a subdomain called test123 pointed to floder public_html/123
			$command="<font size=2 color=blue>".'PHPcPanel_add_subdomain("test123","123")' ."</font><br>";
			if (PHPcPanel_add_subdomain("test123","123")) {
				echo "<tr><td>$command create subdomain 'test123' pointed to directory 'public_html/123/' </td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command create subdomain 'test123' pointed to directory 'public_html/123/' </td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}	
			
			//to create new ftp account
			$command="<font size=2 color=blue>".'PHPcPanel_add_ftp_account("testftp","passwrd","123/","100")' ."</font><br>";
			if(PHPcPanel_add_ftp_account("testftp","passwrd","123/","100")){ //ftp_account_name, password, homedir, quota=100M(0 is unlimited)
				echo "<tr><td>$command create ftp account 'testftp' pointed to directory 'public_html/123/' </td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command create ftp account 'testftp' pointed to directory 'public_html/123/' </td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}
			
			//to edit quota for a ftp account from 100M to 123M
			$command="<font size=2 color=blue>".'PHPcPanel_edit_quota_ftp_account("testftp","123")' ."</font><br>";
			if(PHPcPanel_edit_quota_ftp_account("testftp","123")){ //ftp_account_name, new quota=123M(old one is 100M)
				echo "<tr><td>$command edit quota of ftp account 'testftp' </td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command edit quota of ftp account 'testftp'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}
			
			//to change password for a ftp account
			$command="<font size=2 color=blue>".'PHPcPanel_change_ftp_password("testftp","paswrd2")' ."</font><br>";
			if(PHPcPanel_change_ftp_password("testftp","paswrd2")){ //ftp_account_name, new password
				echo "<tr><td>$command change password of a ftp account 'testftp' </td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command change password of a ftp account 'testftp'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}	
			
			//to add a new mysql account unishops_testdb (if your domain is unishops)
			$command="<font size=2 color=blue>".'PHPcPanel_add_mysql_datebase("testdb")' ."</font><br>";
			if(PHPcPanel_add_mysql_datebase("testdb")){ //db_name only testdb, and finally will obtain as yourdomain_testdb
				echo "<tr><td>$command add new mysql database account 'yourdomain_testdb'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command add new mysql database account 'yourdomain_testdb'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}		
			
			//to add a new mysql user unishops_testuser (if your domain is unishops)
			$command="<font size=2 color=blue>"."PHPcPanel_mysql_add_user('testuser','paswrd')" ."</font><br>";
			if(PHPcPanel_mysql_add_user("testuser","paswrd")){ //user_name only testuser, and finally will obtain as yourdomain_testuser
				echo "<tr><td>$command add new mysql user 'yourdomain_testuser' with password 'paswrd'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command add new mysql user 'yourdomain_testuser' with password 'paswrd'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}
			
			//to add mysql user 'unishops_testuser' to database 'unishops_testdb' (if your domain is unishops)
			$command="<font size=2 color=blue>".'PHPcPanel_add_mysql_user_to_db("testuser","testdb")' ."</font><br>";
			if(PHPcPanel_add_mysql_user_to_db("testuser","testdb")){ //user_name and db_name do not include prefix 'yourdomain_', and finally will obtain as yourdomain_testuser
				echo "<tr><td>$command add mysql user 'yourdomain_testuser' to database 'yourdomain_testdb'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command add mysql user 'yourdomain_testuser' to database 'yourdomain_testdb'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}			
			
			//to delete a mysql user unishops_testuser (if your domain is unishops)
			$command="<font size=2 color=blue>".'PHPcPanel_delete_mysql_user("testuser")' ."</font><br>";
			if(PHPcPanel_delete_mysql_user("testuser")){ //user_name only testuser, and finally will obtain as yourdomain_testuser
				echo "<tr><td>$command delete mysql user 'yourdomain_testuser'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command delete mysql user 'yourdomain_testuser'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}
			
			//to delete new mysql account unishops_testdb (if your domain is unishops)
			$command="<font size=2 color=blue>".'PHPcPanel_delete_mysql_datebase("testdb")' ."</font><br>";
			if(PHPcPanel_delete_mysql_datebase("testdb")){ //db_name only testdb, and finally will obtain as yourdomain_testdb
				echo "<tr><td>$command delete mysql database account 'yourdomain_testdb'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command delete mysql database account 'yourdomain_testdb'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}		
			
			//to delte ftp account testftp
			$command="<font size=2 color=blue>".'PHPcPanel_delete_ftp_account("testftp")' ."</font><br>";
			if(PHPcPanel_delete_ftp_account("testftp")){ //ftp_account_name, new quota=123M(old one is 100M)
				echo "<tr><td>$command delete ftp account 'testftp'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command delete ftp account 'testftp' </td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}	
			
			//to delete floder /home/public_html/123/
			$command="<font size=2 color=blue>".'PHPcPanel_delete_floder("123/")' ."</font><br>";
			if (PHPcPanel_delete_floder("123/")) {// only 123/ is <font size=3 color=green><strong>OK</strong></font>, 'home/public_html/' will be add automatically
				echo "<tr><td>$command delete floder 'public_html/123/'</td><td><font size=3 color=green><strong>OK</strong></font></td></tr>" ;
			}else{
				echo "<tr><td>$command delete floder 'public_html/123/'</td><td><font size=3 color=red>Failed</font></td></tr>" ;
			}
			
			echo "</table>";
			
		}else{
			echo "<font size=3 color=red>Login Failed, User/Password for cpanel is not match</font>" ;
		}
}else{
	echo ("<script type='text/javascript'> alert('Please config PHPcPanel at first.');location.href='./install/index.php'</script>"); 
}

?>
  
</p>
<p>Report Finished!</p>
</body>
</html>