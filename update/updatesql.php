<?php
echo "正在更新数据库";
$content=<<<eof
ALTER TABLE `sky_config` ADD COLUMN `wx_auto_login`  tinyint(3) UNSIGNED NOT NULL DEFAULT 0 AFTER `skins_fttype`;

CREATE TABLE `sky_mod_forum_config` (`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,`content`  mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,PRIMARY KEY (`id`))ENGINE=InnoDBDEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;

eof;
$arr=explode("\r\n",$content);
foreach($arr as $sql){
	@sqlquery($sql);
}
function sqlquery($sql){
	global $link;
	
	$sql=str_replace("sky_",TABLE_PRE,$sql);
 
	if(!@mysqli_query($link,$sql)){
		echo mysqli_error ( $link );
	};
	 
}
 
?>