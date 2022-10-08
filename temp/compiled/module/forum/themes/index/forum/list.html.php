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
			<div class="header-title"><?php echo $this->_var['group']['title']; ?></div>
		</div>
		<div class="header-row"></div>
		<div class="main-body none" :class="'flex-col'" id="App">
			
			<div class="tabs-border">
				<div :class="catid==0?'tabs-border-active':''" class="tabs-border-item"  @click="setCat(0)">全部</div>
 
				<div :class="catid==item.catid?'tabs-border-active':''"  v-for="(item,index) in catlist" :key="index"  @click="setCat(item.catid)" class="tabs-border-item" >{{item.title}}</div>
				 
			</div>
			<div class="sglist" id="list">
				<div v-if="recList">
				<a v-for="(item,index) in recList" :key="index" :href="'/module.php?m=forum&a=show&id='+item.id" class="sglist-item">
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
					
					<div class="mgb-5 flex flex-ai-center">
						<div class="btn-recommend">荐</div>
						<div>{{item.title}}</div>
					</div>
					<div class="sglist-desc">{{item.description}}</div>
					<div v-if="item.imgslist" class="sglist-imglist">
						 
						<img v-for="(cc,ii) in item.imgslist" :key="ii" :src="cc+'.100x100.jpg'" class="sglist-imglist-img" />
						 
					</div>
					<div class="sglist-ft">
						<div class="sglist-ft-love">{{item.love_num}}</div>
						<div class="sglist-ft-cm">{{item.comment_num}}</div>
						<div class="sglist-ft-view">{{item.view_num}}</div>
					</div> 
				</a>
				</div>
				<div v-if="list">
				<a v-for="(item,index) in list" :key="index" :href="'/module.php?m=forum&a=show&id='+item.id" class="sglist-item">
					<div class="flex mgb-5">
						<img :src="item.user_head+'.100x100.jpg'" class="wh-40 bd-radius-50" />
						<div class="flex-1 mgl-5">
							<div class="f14 fw-600 mgb-5">{{item.nickname}}</div>
							<div class="flex">
								<div class="f12 cl3">{{item.timeago}}</div>								
							</div>
						</div>		 
					</div>
					<div class="sglist-title mgb-10">{{item.title}}</div>
					<div class="sglist-desc">{{item.description}}</div>
					<div v-if="item.imgslist" class="sglist-imglist">
						 
						<img v-for="(cc,ii) in item.imgslist" :key="ii" :src="cc+'.100x100.jpg'" class="sglist-imglist-img" />
						 
					</div>
					<div class="sglist-ft">
						<div class="sglist-ft-love">{{item.love_num}}</div>
						<div class="sglist-ft-cm">{{item.comment_num}}</div>
						<div class="sglist-ft-view">{{item.view_num}}</div>
					</div> 
				</a>
				</div>  
			</div>
			<div v-if="per_page>0" class="loadMore" @click="getList">加载更多...</div>
			<div @click="goAdd()" class="fixedAdd">发布</div>
		</div>
		
		<?php echo $this->fetch('footer.html'); ?>
		<script>
			var gid="<?php echo $this->_var['group']['gid']; ?>";
		</script>
		 <script src="<?php echo $this->_var['skins']; ?>forum/list.js"></script>
		 <?php wx_jssdk();?>
		 <script type="text/javascript">
		 	wxshare_title="<?php echo $this->_var['group']['title']; ?>";
		 	<?php if ($this->_var['group']['imgurl']): ?> 
		 	 wxshare_imgUrl="<?php echo images_site($this->_var['group']['imgurl']); ?>.100x100.jpg";
		 	 <?php endif; ?>
		 </script>
	</body>
</html>
