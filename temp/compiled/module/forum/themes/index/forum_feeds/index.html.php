<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<div class="header">
			<div url="/module.php?m=forum" class="header-back"></div>
			<div class="header-title">我的关注</div>
			 
		</div>
		<div class="header-row"></div>
		<div class="main-body" id="app">
			 
			<div style="display: none;" :class="'flex-col'" class="sglist">
				<div v-if="!list || Object.keys(list).length==0" class="emptyData">暂无信息</div> 
				<div v-for="(item,index) in  list" :key="index" @click="goBlog(item.id)" class="sglist-item">
					<div class="flex mgb-5">
						<img :src="item.user_head+'.100x100.jpg'" class="wh-40 bd-radius-50" />
						<div class="flex-1 mgl-5">
							<div class="flex flex-ai-center mgb-5">
								<div class="f14 fw-600 ">{{item.nickname}}</div>
								<span class="mgl-5 cl-warning f12">{{item.user.rank.rank_name}}</span>
							</div>
							<div class="flex">
								<div class="f12 cl3">{{item.timeago}}</div>
								
							</div>
						</div>
						<div class="cl2 f12">来自{{item.group_title}}</div>  
					</div>
					<div class="sglist-title mgb-10"><?php echo $this->_var['c']['title']; ?></div>
					 
					<div v-if="item.imgslist" class="sglist-imglist">
						 
						<img v-for="(cc,ii) in item.imgslist" :key="ii" :src="cc+'.100x100.jpg'" class="sglist-imglist-img" />
						 
					</div>
					<div class="sglist-ft">
						<div class="sglist-ft-love">{{item.love_num}}</div>
						<div class="sglist-ft-cm">{{item.comment_num}}</div>
						<div class="sglist-ft-view">{{item.view_num}}</div>
					</div> 
				</div>
				<div class="loadMore" v-if="per_page>0" @click="getList">加载更多</div>
			</div>
			
		</div>
		<?php $this->assign('ftnav','home'); ?>
		<?php echo $this->fetch('ftnav.html'); ?>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="<?php echo $this->_var['skins']; ?>forum_feeds/index.js?v=2"></script>
	</body>
</html>
