<?php
/*************************************************************
                PHPcPanel                                  
 last modification 2012/12/18
 website  http://www.ushops.net/phpcpanel
 download address: https://sourceforge.net/projects/phpcpanel/
 Authod: Lu    phpcpanel@gmail.com
**************************************************************/

/*
echo $_SERVER['DOCUMENT_ROOT']."<br>"; //获得服务器文档根变量  /home/unishops/public_html
echo $_SERVER['PHP_SELF']."<br>"; //获得执行该代码的文件服务器绝对路径的变量 /phpcpanel/test.php
echo __FILE__."<br>"; //获得文件的文件系统绝对路径的变量 /home/unishops/public_html/phpcpanel/PHPcPanel.php
echo dirname(__FILE__); //获得文件所在的文件夹路径的函数 /home/unishops/public_html/phpcpanel/
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