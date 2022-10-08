<?php
error_reporting(E_ALL ^ E_NOTICE);
define('ROOT_PATH',  dirname(str_replace('\\', '/', dirname(__FILE__)))."/");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自动更新文件</title>
</head>

<body>
<?php
 
if(empty($_GET['a']))
{
	echo "升级前请确认备份好数据库内容,升级完删除此目录。<br><a href='index.php?a=update'>开始升级</a>";
}
if($_GET['a']=='update')
{
	echo "开始更新";
	include_once("../config/database.php");
	 
	if(!$link=mysqli_connect($dbconfig["master"]['host'],$dbconfig["master"]['user'],$dbconfig["master"]['pwd']))
	{
		
		exit('连接数据库失败');
	}else{
		echo "链接数据库成功";
	}
	echo "更新数据库";
	mysqli_select_db($link,$dbconfig["master"]['database']);
	if(file_exists("updatesql.php")){
		include("updatesql.php");
		 
	}
	 echo "更新文件";
	movedir("update");
	echo "更新成功请删除update目录";
	exit();

}


/*复制目录*/
function movedir($from)
{
	if(!file_exists($from)) return false;
	$dh=opendir($from);
	while(($file=readdir($dh))!=false)
	{
		if($file!="."&&$file!="..")
		{
			
			$f=substr("$from/$file",strpos("$from/$file","/"));
			
			if(is_dir($from."/".$file))
			{
				if(!file_exists(ROOT_PATH.$f))
				{
					mkdir(ROOT_PATH.$f);
				}
				movedir("$from/$file");
			}else
			{	
				@copy("$from/$file",ROOT_PATH.$f);
			}
		}
	}
}


?>
</body>
</html>