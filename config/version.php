<?php
class cmsVersion{
	public static function get(){
		return array(
			"version"=>"得推论坛",
			"version_num"=>2.2,
			"onlineupdate"=>"https://www.deituicms.com/index.php?m=newversion&a=update&product=forum",
			"checkversion"=>"https://www.deituicms.com/index.php?m=newversion&product=forum",
			"checkshouquan"=>"https://www.deituicms.com/index.php?m=newversion&a=checkshouquan&product=forum",
			"description"=>"得推微论坛是基于deituiCMS开发的一款论坛系统，可以快速发帖评论，支持微信公众号、小程序、APP。",
			"mds"=>array("forum")
		);
	}
}
define("POWEREDBY","----powered by www.deituicms.com");
?>