<?php 
	include_once('../PHPcPanel.php');
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
.title {
	text-decoration: none;
}
.kk {
	color: #F03;
	background-color: #999;
}
.kk font {
	color: #F00;
	font-weight: bold;
}
.ff {
	color: #F00;
	text-decoration: none;
	background-color: #CCC;
	font-size: larger;
}
-->
</style><body>
<h2><strong>Config <a href="http://www.ushops.net/phpcpanel/" class="title" target="_blank">PHPcPanel</a></strong></h2>
<p><a href="doc/index.html">Documents &gt;&gt;</a></p>
<p class="kk"><font color="#99FF66">Now config PHPcPanel....</font></p>
<p><strong>What is PHPcPanel?</strong></p>
<p>PHPcPanel is a php opensource tool used to manage your website without requiring manually login cpanel. This package can automatically open new FTP and mysql account. If you are a web master, and you always have to mange your website and do things like open FTP account, you could combine this package to php program. It will let you easily manage your website space.</p>
<p><strong>Features</strong></p>
<p>(1) automatically login your cpanel ;<br />
(2) easily create/edit/delete ftp account;<br />
(3) easily create/editdelete mysql account;<br />
(4) easily create/delete floder;<br />
(5) easily create/delete sub-domain;<br />
(6) text file based, no need of database support.</p>
<p>&nbsp;</p>
<p><strong>Latest Verstion?</strong></p>

<p><font color="#00FF00">Get Latest Version Here : <?php echo PHPcPanel_get_PHPcPanel_latest_version_number("1");?> </font><br />
  PHPcPanel is a open source program, and you can get the newest version from<br />
 <font color="#FF0000"><a href="http://www.ushops.net/phpcpanel/"  target="_blank">http://www.ushops.net/phpcpanel/</a></font>
 <br /> <font color="#0000FF"><a href="http://www.ushops.net/phpcpanel/"  target="_blank">http://phpcpanel.ushops.net</a></font>
 <br /> <font color="#0000FF"><a href="https://sourceforge.net/projects/phpcpanel/ "  target="_blank">https://sourceforge.net/projects/phpcpanel/ </a></font>
 </p>
 
<p>&nbsp;</p>
<p><strong>INATALLATION</strong></p>
<p>(1)download PHPcPanel full package<br />
(2)unzip the package<br />
(3)upload all files to your website<br />
(4)goto http://yourwebsite/phpcpanel/install/index.php, and install PHPcPanel<br />
(5)run http://yourwebsite/phpcpanel/demo.php to study how to use PHPcPanel.<br />
<br />
<span class="bodytext"><font color="#FF0000" size="3">a) Don't forget to &quot;include(./PHPcPanel.php)&quot;<br />
b) </font></span><span style="font: 0.7em Tahoma, sans-serif"><font color="#FF0000" size="3">M</font></span><span class="bodytext"><font color="#FF0000" size="3">ake sure floder <font color="#0066FF">./PHPcPanel/bin/data/</font> is writable 777<br />
c) </font></span><span style="font: 0.7em Tahoma, sans-serif"><font color="#FF0000" size="3">A</font></span><span class="bodytext"><font color="#FF0000" size="3">fter successful install, delete file ./PHPcPanel/install/index.php</font></span></p>
<p><strong><font color="Red" size="3"> Config Your Host for PHPcPanel</font></strong></p>

<table size=2 border="1">
<form id="form1" name="form1" method="post" action="">
  <tr align="right"><td>Host:</td><td align="left"><input type="text" name="host" id="host" value="<?php $a=$_SERVER['SERVER_NAME']; echo $a; ?>" size='40'/></td></tr>
  <tr align="right"><td>Port:</td><td align="left"><input type="text" name="port" id="port" value="2082" size='40'/></td></tr>  
  <tr align="right"><td>Login User:</td><td align="left"><input type="text" name="user" id="user"  size='40' value="<?php echo $svr_user;?>"/></td></tr>
  <tr align="right"><td>Login Password:</td><td align="left"><input type="password" name="password" id="svr_password"  size='40' value="<?php echo $svr_pass;?>"/></td></tr>
  <tr align="right"><td>Document Root:</td><td align="left"><input type="text" name="document_root" id="document_root"  size='40' value="<?php $a=$_SERVER['DOCUMENT_ROOT']; echo $a; ?>/ "/></td></tr>
  <tr align="right"><td>Contact Email:</td><td align="left"><input name="email" type="text" id="email" value="<?php echo $svr_email; ?>"  size='40'/></td></tr>  
  <tr align="right"><td> </td><td><input name="" type="submit" value="save and test"/></td></tr>
</form>
</table>
<p>&nbsp;</p>
<p class="ff"><strong><font color="Red" size="+5"><a href="../demo.php">DEMO &gt;&gt;</a></font></strong><a href="../demo.php"> </a></p>
<p>After config cPanel, goto <a href="../demo.php">demo.php</a> for testing PHPcPanel.</p>
<p>&nbsp;</p>

<?php
		$svr_host=$_REQUEST["host"];
		$svr_port=$_REQUEST["port"];
		$svr_user=$_REQUEST["user"];
		$svr_pass=$_REQUEST["password"];
		$svr_document_root=$_REQUEST["document_root"];	
        $svr_email=$_REQUEST["email"];
        
       
        if ((strlen(trim($svr_host))==0)or(strlen(trim($svr_port))==0)or(strlen(trim($svr_user))==0)
            or(strlen(trim($svr_pass))==0)or(strlen(trim($svr_document_root))==0)or(strlen(trim($svr_email))==0))
        {
        	echo ("<script type='text/javascript'> alert('Please finish all of information and save');</script>"); 
			die('ERROR:Please finish all of information and save');
        }else{
			if(save_config()){
				echo ("<script type='text/javascript'> alert('save configration is ok! Now goto demo page.');location.href='../demo.php'</script>"); 
			}else{
				echo ("<script type='text/javascript'> alert('Error in saving configration!');</script>"); 
			}
		}
?>
</body>
</html>
