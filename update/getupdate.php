<?php
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
$oldtime=strtotime("2022-07-01 12:00:01");
file_put_contents("lastUpdate.txt",$oldtime."\r\n",FILE_APPEND);
getdir("..");
//getdir("../config");
getdir("../api",1);
getdir("../extends",1);
getdir("../plugin",1);
getdir("../skymvc",1);
getdir("../source",1);
getdir("../module",1);
getdir("../static",1);
getdir("../themes",1);




function getdir($dir,$d=0)
{
	global $oldtime;
	if(!is_dir($dir)) return false;
	$dh=opendir($dir);
	while(($file=readdir($dh))!==false)
	{
		if($file!="." && $file!="..")
		{
			if($file=='_notes') continue;
			if(is_dir($dir."/".$file))
			{
				$d && getdir($dir."/".$file,$d);	
			}else
			{
				$newfile= $dir."/".$file;
				if(($t=filemtime($newfile))>$oldtime ){
					echo $newfile."<br>";
					copyfile($newfile);
				}
				
			}
		}
	}
	closedir($dh);
	 
	
}

/*转移文件*/
function copyfile($file){
	$newfile=str_replace("..","update",$file);
	umkdir($newfile);
	copy($file,$newfile);
}

/*创建文件夹*/
function umkdir($dir)
{
	$dir=dirname($dir);
	if(!file_exists($dir)){
		mkdir($dir,0755,true);
	}
}

?>