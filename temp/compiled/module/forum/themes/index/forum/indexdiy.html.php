<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<link href="/plugin/swiper/css/swiper.min.css" rel="stylesheet" />
	<link href="<?php echo $this->_var['skins']; ?>forum/index.css?v2" rel="stylesheet" />
	<body>
		<div class="header">
			<div url="/" class="header-back pos-relative"></div> 
			<div class="header-search-box">
				 
				<input id="search-word" class="header-search pdl-5" placeholder="搜你想要的" type="text">
				<div id="search-btn" class="header-search-btn  iconfont icon-search"></div>
			</div>
			 
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<div class="swiper-container" id="indexFlash">
				<div class="swiper-wrapper">
					<?php $_from = $this->_var['flashList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
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
			    <?php $_from = $this->_var['navList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
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
				<?php $_from = $this->_var['adList']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; if (count($_from)):
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
				<div gourl="/module.php?m=forum_paihang"  class="tabNav-item">排行榜</div>
			</div>
			<div class="sglist">
				<?php echo $this->fetch('inc/forum_item.html'); ?>
			</div>
			
		</div>
		<?php $this->assign('ftnav','index'); ?>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>
		<?php wx_jssdk(false);?>
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
