<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/

/*
echo $_SERVER['DOCUMENT_ROOT']."<br>"; //��÷������ĵ�������  /home/unishops/public_html
echo $_SERVER['PHP_SELF']."<br>"; //���ִ�иô�����ļ�����������·���ı��� /phpcpanel/test.php
echo __FILE__."<br>"; //����ļ����ļ�ϵͳ����·���ı��� /home/unishops/public_html/phpcpanel/PHPcPanel.php
echo dirname(__FILE__); //����ļ����ڵ��ļ���·���ĺ��� /home/unishops/public_html/phpcpanel/
*/

function remove_directory($dir) {
  if ($handle = opendir("$dir")) {
   while (false !== ($item = readdir($handle))) {
     if ($item != "." && $item != "..") {
       if (is_dir("$dir/$item")) {
         remove_directory("$dir/$item");
       } else {
         unlink("$dir/$item");
         //echo " removing $dir/$item<br>\n";
       }
     }
   }
   closedir($handle);
   rmdir($dir);
   //echo "removing $dir<br>\n";
  }
}

?>