<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<div class="header">
			<div url="/module.php?m=forum" class="header-back"></div>
			<div class="header-title">详情</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body pd-10 bg-fff mgb-10">
			<div class="d-userbox">
				<image gourl="/module.php?m=forum_home&userid=<?php echo $this->_var['author']['userid']; ?>" class="d-userbox-head" src="<?php echo $this->_var['author']['user_head']; ?>.100x100.jpg"></image>
				<div class="flex-1">
					<div gourl="/module.php?m=forum_home&userid=<?php echo $this->_var['author']['userid']; ?>"  class="d-userbox-nick"><?php echo $this->_var['author']['nickname']; ?></div>
					<div class="d-userbox-follows flex-ai-center">
						<text>粉丝</text>
						<text class="cl-num mgr-5 "><?php echo $this->_var['author']['followed_num']; ?></text>
						<text>关注</text>
						<text class="cl-num"><?php echo $this->_var['author']['follow_num']; ?></text>
						 
					</div>
				</div>
				<div class="btn-small btn-outline-success js-follow-toggle" data-userid="<?php echo $this->_var['author']['userid']; ?>"><?php if ($this->_var['author']['isFollow']): ?>已<?php endif; ?>关注</div>
			</div>
			<div class="d-title"><?php echo $this->_var['data']['title']; ?></div>
			<div class="d-tools">
				<?php if ($this->_var['data']['gold']): ?>
				<div class="flex-1 cl-num">赏金 <?php echo $this->_var['data']['gold']; ?></div>
				<?php endif; ?>
				<div class="mgr-10 cl2">作者：<?php echo $this->_var['author']['nickname']; ?></div>
				<div class="cl2"><?php echo $this->_var['data']['timeago']; ?></div>
			</div>
			<div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
			<div class="flex-center mgb-10">
				<?php $_from = $this->_var['imgslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<img src="<?php echo $this->_var['c']; ?>" class="wmax mgb-5" />
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<div class="flex flex-center mgb-10">
				<div class="btn-love js-love-toggle <?php if ($this->_var['islove']): ?>btn-love-active<?php endif; ?> mgr-10" tablename="mod_forum" objectid="<?php echo $this->_var['data']['id']; ?>">
					喜欢
				</div>

				<div class="btn-fav js-fav-toggle <?php if ($this->_var['isfav']): ?>btn-fav-active<?php endif; ?> mgr-10" tablename="mod_forum" objectid="<?php echo $this->_var['data']['id']; ?>">收藏</div>

			</div>
			
		</div>
		<div class="main-body">
			<?php echo $this->fetch('inc/comment.html'); ?>
		</div>
		
		<a href="/module.php?m=forum&a=add" class="fixedAdd">发布</a>
		<?php echo $this->fetch('footer.html'); ?>

		<script src="<?php echo $this->_var['skins']; ?>inc/comment.js"></script>
		<?php wx_jssdk();?>
		<script type="text/javascript">
			wxshare_title="<?php echo $this->_var['data']['title']; ?>";
			<?php if ($this->_var['data']['imgurl']): ?> 
			 wxshare_imgUrl="<?php echo images_site($this->_var['data']['imgurl']); ?>.100x100.jpg";
			 <?php endif; ?>
		</script>
	</body>
</html>
