<?php
			define("MYSQL_CHARSET", "utf8mb4");
			define("TABLE_PRE", "sky_");
			$dbclass="mysqli";
			$dbconfig["master"]=array(
				"host"=>"127.0.0.1","user"=>"root","pwd"=>"root","database"=>"deituicms_bbs" 
			);
			/**其他分表库**/
			/*
			$dbconfig["user"]=array(
				"host"=>"localhost","user"=>"root","pwd"=>"123","database"=>"skyshop"
			);
			
			$dbconfig["article"]=array(
				"host"=>"localhost","user"=>"root","pwd"=>"123","database"=>"skycms"
			);
			*/ 
			
			/*分库配置*/
			/* 
			$VMDBS=array(
				"article"=>"article",
				"forum"=>"article"
			);
			*/ 
			
		?>