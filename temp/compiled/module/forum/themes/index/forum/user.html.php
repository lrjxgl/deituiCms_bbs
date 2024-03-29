<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<link href="<?php echo $this->_var['skins']; ?>forum/user.css" rel="stylesheet" />
	<body>
		<div class="header">
			<div class="header-title">我的</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="flex pd-10 mgb-10 bg-white flex-ai-center">
				<image class="wh-60 mgr-5 bd-radius-50" gourl="/index.php?m=user&a=user_head" src="<?php echo $this->_var['user']['user_head']; ?>.100x100.jpg" />
				<div class="flex-1">
					<div class="mgb-10 f16 flex">
						<div><?php echo $this->_var['user']['nickname']; ?></div>
						<div class="flex-1"></div>
						<?php if ($this->_var['invitecode']): ?>
						<div class="cl2 mgr-5">邀请码</div>
						<div class="cl-num"><?php echo $this->_var['invitecode']; ?></div>
						<?php endif; ?>
					</div>
					<div class="flex mgb-5">
						<div class="mgr-5">金币</div>
						<div class="cl-money mgr-2"> <?php echo $this->_var['user']['gold']; ?></div>
						<div>个</div>
					</div>
					<div class="flex">
						<div class="cl2 f12 mgr-5">帖子</div>
						<div class="cl2 f12 mgr-10 "> <?php echo $this->_var['topic_num']; ?></div>
						<div class="cl2 f12">评论 <?php echo $this->_var['comment_num']; ?></div>
						
					</div>
				</div>
				<div gourl="/index.php?m=user&amp;a=set" class="flex-center btn-small btn-link iconfont icon-settings"></div>
			</div>
		
			<div class="row-box mgb-5">
				<div gourl="/module.php?m=forum&a=my" class="row-item">
					<div class="row-item-icon icon-news  cl-u"></div>
					<div class="row-item-title">我的贴子</div>
				</div>
				<div gourl="/module.php?m=forum_comment&a=my" class="row-item">
					<div class="row-item-icon icon-comment  cl-u"></div>
					<div class="row-item-title">我的评论</div>
				</div>
				<div gourl="/module.php?m=forum&a=myfav" class="row-item">
					<div class="row-item-icon icon-favor  cl-u"></div>
					<div class="row-item-title">我的收藏</div>
				</div>
				<div gourl="/index.php?m=gold_log" class="row-item">
					<div class="row-item-icon icon-choiceness  cl-u"></div>
					<div class="row-item-title">金币日志</div>
				</div> 
				<div gourl="/index.php?m=notice&a=my" class="row-item">
					<div class="row-item-icon icon-notice  cl-u"></div>
					<div class="row-item-title">我的消息</div>
				</div>
			</div>	
			<div class="row-box mgb-5"> 
				<div gourl="/index.php?m=user_auth" class="row-item">
					<div class="row-item-icon icon-vipcard  cl-u"></div>
					<div class="row-item-title">实名认证</div>
				</div>
				<div gourl="/index.php?m=kefu" class="row-item">
					<div class="row-item-icon icon-service  cl-u"></div>
					<div class="row-item-title">联系客服</div>
				</div>
				<div gourl="/index.php?m=html&a=aboutus" class="row-item">
					<div class="row-item-icon icon-info  cl-u"></div>
					<div class="row-item-title">关于我们</div>
				</div>
			</div>
			 
		</div>
		<?php $this->assign('ftnav','user'); ?>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>
	</body>
</html>
