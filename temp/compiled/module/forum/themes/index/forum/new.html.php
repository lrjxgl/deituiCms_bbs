<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<style>
		.btn-mini{
			padding: 2px;
		}
	</style>
	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">最新帖子</div>
			<div id="getNew" class="header-right-btn">刷新</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body none" :class="'flex-col'" id="App">
			 
			<div class="sglist" id="list">
				 
				<div v-if="list">
				<div v-for="(item,index) in list" :key="index"  class="sglist-item">
					<div class="flex mgb-5">
						<img @click="goUserHome(item.userid)" :src="item.user_head+'.100x100.jpg'" class="wh-40 pointer bd-radius-50" />
						<div class="flex-1 mgl-5">
							<div class="flex flex-ai-center mgb-5">
								<div class="f14 fw-600 ">{{item.nickname}}</div>
								<span class="mgl-5 cl-warning f12">{{item.user.rank.rank_name}}</span>
							</div>
							<div class="flex">
								<div class="f12 cl3">{{item.timeago}}</div>
								
							</div>
						</div>
						<div @click="goGroup(item.gid)" class="cl2 pointer f12">来自{{item.group_title}}</div>  
					</div>
					<div class="pointer" @click="goDetail(item.id)">
						<div class="sglist-title mgb-10">{{item.title}}</div>
						 
						<div v-if="item.imgslist" class="sglist-imglist">
							 
							<img v-for="(cc,ii) in item.imgslist" :key="ii" :src="cc+'.100x100.jpg'" class="sglist-imglist-img" />
							 
						</div>
						<div class="sglist-ft">
							<div class="sglist-ft-love">{{item.love_num}}</div>
							<div class="sglist-ft-cm">{{item.comment_num}}</div>
							<div class="sglist-ft-view">{{item.view_num}}</div>
						</div>
					</div> 
				</div>
				</div>  
			</div>
			<div v-if="per_page>0" class="loadMore" @click="getList">加载更多...</div>
		</div>
		<a href="/module.php?m=forum&a=add" class="fixedAdd">发布</a>
		<?php echo $this->fetch('footer.html'); ?>
		 
		 <script src="<?php echo $this->_var['skins']; ?>forum/new.js?v=23"></script>
	</body>
</html>
