<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">排行榜</div>
		</div>
		<div class="header-row"></div>
		<style>
			.fwb{
				font-weight: 600;
			}
			.rdImg{
				width:40px;
				height: 40px;
				border-radius: 40px;
			}
			.td-a,.td-b,.td-d{
				text-align: center;
				justify-content: center;
				align-items: center;
			}
			.td-a{
				width: 30px;
			}
			.td-b{
				width: 80px;
			}
			.td-c{
				width:100px;
			}
			.td-d{
				width: 60px;
				 
			}
			 
		</style>
		<div class="main-body">
			<div class="tabs-border-group">
				<div class="tabs-border">
					<div class="tabs-border-item tabs-border-active  js-tabs-border-item">热帖榜</div> 
					<div class="tabs-border-item js-tabs-border-item ">名人榜</div>
					 
				</div>
				<div class="row-box tabs-border-box  tabs-border-box-active">
					<div class="sglist">
						<?php $_from = $this->_var['wzList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<a href="/module.php?m=forum&a=show&id=<?php echo $this->_var['c']['id']; ?>" class="sglist-item">
							<div class="flex mgb-10">
								<img src="<?php echo $this->_var['c']['user_head']; ?>.100x100.jpg" class="wh-40 bd-radius-50" />
								<div class="flex-1 mgl-5">
									<div class="flex flex-ai-center mgb-5">
										<div class="f14 fw-600 "><?php echo $this->_var['c']['nickname']; ?></div>
										<span class="mgl-5 cl-warning f12"><?php echo $this->_var['c']['user']['rank']['rank_name']; ?></span>
									</div>
									<div class="flex">
										<div class="f12 cl3"><?php echo $this->_var['c']['timeago']; ?></div>
										
									</div>
								</div>
								<div class="cl2 f12">来自<?php echo $this->_var['c']['group_title']; ?></div>  
							</div>
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
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
				</div>
				<div class="row-box tabs-border-box">
					<div class="flex mgb-10">
						<div class="td-a fwb">排行</div>
						<div class="td-b fwb">头像</div>
						<div class="td-c fwb">昵称</div>
						<div class="flex-1"></div>
						<div class="td-d fwb">粉丝</div>
					</div>
					<?php $_from = $this->_var['fsList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
					<div gourl="/module.php?m=forum_home&userid=<?php echo $this->_var['c']['userid']; ?>"  class="flex flex-ai-center mgb-10">
						<div class="td-a cl-num"><?php echo $this->_var['k']+1; ?></div>
						<div class="td-b"><img class="rdImg" src="<?php echo $this->_var['c']['user_head']; ?>.100x100.jpg" /></div>
						<div class="td-c"><?php echo $this->_var['c']['nickname']; ?></div>
						<div class="flex-1"></div>
						<div class="td-d cl-num"><?php echo $this->_var['c']['followed_num']; ?></div>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				
			</div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="<?php echo $this->_var['skins']; ?>forum_paihang/index.js"></script>
	</body>
</html>
