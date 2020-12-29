<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<link href="/plugin/swiper/css/swiper.min.css" rel="stylesheet" />
	<link href="<?php echo $this->_var['skins']; ?>forum/index.css" rel="stylesheet" />
	<body>
		<div class="header">
			<img class="header-logo" src="<?php echo $this->_var['site']['logo']; ?>.100x100.jpg" /> 
			<div class="header-search-box">
				 
				<input id="search-word" class="header-search pdl-5" placeholder="搜你想要的" type="text">
				<div id="search-btn" class="header-search-btn bg-primary cl-white iconfont icon-search"></div>
			</div>
			 
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="swiper-container" id="indexFlash">
				<div class="swiper-wrapper">
					<?php $_from = $this->_var['flashList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
					<div class="swiper-slide">
						<img gourl="<?php echo $this->_var['c']['link1']; ?>" class="wmax" src="<?php echo $this->_var['c']['imgurl']; ?>" />
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>

				<div class="swiper-pagination"></div>

			</div>
			<?php if ($this->_var['navList']): ?>
			<div class="m-navPic mgb-5">
			    <?php $_from = $this->_var['navList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
			    <a href="<?php echo $this->_var['c']['link1']; ?>" class="m-navPic-item">
					  <img class="m-navPic-img" src="<?php echo $this->_var['c']['imgurl']; ?>" />
					  <div class="m-navPic-title"><?php echo $this->_var['c']['title']; ?></div>				   
			    </a>		
			    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['adList']): ?>
			<div class="adBox">
				<?php $_from = $this->_var['adList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<div class="adBox-item">
					<img gourl="<?php echo $this->_var['c']['link1']; ?>" src="<?php echo $this->_var['c']['imgurl']; ?>" class="adBox-img" />
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			
			</div>
			<?php endif; ?>
			<style>
				.tabNav{
					padding: 10px;
					display: flex;
					flex-direction: row;
					align-items: center;
					justify-content: center;
					background-color: #fff;
					border-bottom: 1px solid #eee;
				}
				.tabNav-item{
					cursor: pointer;
					margin-right: 40px;
					font-weight: 600;
				}
				.tabNav-item-active{
					color: #f60;
					padding-bottom: 3px;
				 
				}
			</style>
			<div class="tabNav">
				<div gourl="/module.php?m=forum" class="tabNav-item tabNav-item-active">推荐</div>
				<div gourl="/module.php?m=forum&a=new"  class="tabNav-item">最新</div>
				<div gourl="/module.php?m=forum_feeds"  class="tabNav-item">关注</div>
				<div gourl="/module.php?m=forum_paihang"  class="tabNav-item">名人榜</div>
			</div>
			<div class="sglist">
				<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<a href="/module.php?m=forum&a=show&id=<?php echo $this->_var['c']['id']; ?>" class="sglist-item">
					<div class="flex mgb-10">
						<img src="<?php echo $this->_var['c']['user_head']; ?>.100x100.jpg" class="wh-40 bd-radius-50" />
						<div class="flex-1 mgl-5">
							<div class="f14 fw-600 mgb-5"><?php echo $this->_var['c']['nickname']; ?></div>
							<div class="flex">
								<div class="f12 cl3"><?php echo $this->_var['c']['timeago']; ?></div>
								
							</div>
						</div>
						<div class="cl2 f12">来自<?php echo $this->_var['c']['group_title']; ?></div>  
					</div>
					<div class="sglist-title mgb-10"><?php echo $this->_var['c']['title']; ?></div>
					 
					<div class="sglist-imglist">
						<?php $_from = $this->_var['c']['imgslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'img');if (count($_from)):
    foreach ($_from AS $this->_var['img']):
?>
						<img src="<?php echo $this->_var['img']; ?>.100x100.jpg" class="sglist-imglist-img" />
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					<div class="sglist-ft">
						<div class="sglist-ft-love"><?php echo $this->_var['c']['love_num']; ?></div>
						<div class="sglist-ft-cm"><?php echo $this->_var['c']['comment_num']; ?></div>
						<div class="sglist-ft-view"><?php echo $this->_var['c']['view_num']; ?></div>
					</div> 
				</a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<div class="flex-center pd-10">
				<a class="f12 cl3" href="http://beian.miit.gov.cn"><?php echo $this->_var['site']['icp']; ?></a>
			</div>
		</div>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>
		<script>
			$(document).on("click","#search-btn",function(){
				var word=$("#search-word").val();
				window.location="/module.php?m=forum&a=search&keyword="+encodeURI(word)
			})
		</script>
		<script src="/plugin/swiper/js/swiper.min.js"></script>
		<script>
			$(function() {
				var flash = new Swiper("#indexFlash");
			})
		</script>
	</body>
</html>
