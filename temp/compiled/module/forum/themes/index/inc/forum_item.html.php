
<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<div   class="sglist-item">
					<div class="flex mgb-10">
						<img gourl="/module.php?m=forum_home&userid=<?php echo $this->_var['c']['userid']; ?>" src="<?php echo $this->_var['c']['user_head']; ?>.100x100.jpg" class="wh-40 bd-radius-50" />
						<div class="flex-1 mgl-5">
							<div class="flex flex-ai-center mgb-5">
								<div class="f14 fw-600 "><?php echo $this->_var['c']['nickname']; ?></div>
								<span class="mgl-5 cl-warning f12"><?php echo $this->_var['c']['user']['rank']['rank_name']; ?></span>
							</div>
							
							<div class="flex">
								 
								<div class="f12 cl3"><?php echo $this->_var['c']['timeago']; ?></div>
								
							</div>
						</div>
						<div gourl="/module.php?m=forum&a=list&gid=<?php echo $this->_var['c']['gid']; ?>" class="cl2 f12">来自<?php echo $this->_var['c']['group_title']; ?></div>  
					</div>
					<a href="/module.php?m=forum&a=show&id=<?php echo $this->_var['c']['id']; ?>">
						<?php if (isset ( $this->_var['c']['imgslist'] )): ?>
							<?php if (count ( $this->_var['c']['imgslist'] ) <= 1): ?>
							<div class="flex">
								<div class="sglist-title flex-1 mgb-10"><?php echo $this->_var['c']['title']; ?></div>
								<?php $_from = $this->_var['c']['imgslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
    foreach ($_from AS $this->_var['img']):
?>
								<img src="<?php echo $this->_var['img']; ?>.100x100.jpg" class="wh-100 mgl-10" />
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</div>
							<?php elseif (count ( $this->_var['c']['imgslist'] ) <= 3): ?>
							<div class="sglist-title mgb-10"><?php echo $this->_var['c']['title']; ?></div>
							<div class="sglist-imglist">
								<?php $_from = $this->_var['c']['imgslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
    foreach ($_from AS $this->_var['img']):
?>
								<img src="<?php echo $this->_var['img']; ?>.small.jpg" class="sglist-imglist-img<?php echo count($this->_var['c']['imgslist']); ?>" />
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</div>
							<?php else: ?>
								<div class="sglist-title mgb-10"><?php echo $this->_var['c']['title']; ?></div>
								<div class="sglist-imglist">
									<?php $_from = $this->_var['c']['imgslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
    foreach ($_from AS $this->_var['img']):
?>
									<img src="<?php echo $this->_var['img']; ?>.small.jpg" class="sglist-imglist-img" />
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</div>
							<?php endif; ?> 
						<?php else: ?>
							<div class="sglist-title mgb-10"><?php echo $this->_var['c']['title']; ?></div>
						<?php endif; ?>
						
						<div class="sglist-ft">
							<div class="sglist-ft-love"><?php echo $this->_var['c']['love_num']; ?></div>
							<div class="sglist-ft-cm"><?php echo $this->_var['c']['comment_num']; ?></div>
							<div class="sglist-ft-view"><?php echo $this->_var['c']['view_num']; ?></div>
						</div> 
					</a>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>