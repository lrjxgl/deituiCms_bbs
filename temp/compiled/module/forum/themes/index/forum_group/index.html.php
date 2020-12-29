<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">论坛版块</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="row-box">
				 
				<div class="flexlist">
					<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<div class="flexlist-item" gourl="/module.php?m=forum&a=list&gid=<?php echo $this->_var['c']['gid']; ?>">
							<img  src="<?php echo $this->_var['c']['imgurl']; ?>.100x100.jpg" class="flexlist-img" />
							<div class="flex-1">
								<div class="flexlist-title"><?php echo $this->_var['c']['title']; ?></div>
								<div class="flexlist-row">
									主题数
									<text class="cl-num mgl-5 mgr-10"><?php echo $this->_var['c']['topic_num']; ?></text> 
									 
									评论数
									<text class="cl-num  mgl-5"><?php echo $this->_var['c']['comment_num']; ?></text>
								</div>
								<div class="flexlist-desc"><?php echo $this->_var['c']['description']; ?></div>
							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
			</div>
		</div>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>
	</body>
</html>
