<div id="commentApp" class="none" :class="'flex-col'">
	<div id="comment-list" class="comment-list">
		<div v-for="(item,index) in list" :key="index" >
			<div class="comment-item">
				<image @click="goHome(item.userid)" class="comment-item-head pointer" :src="item.user_head+'.100x100.jpg'"></image>
				<div class="flex-1">
					<div  @click="goHome(item.userid)"  class="comment-item-nick pointer">
						{{item.nickname}}
					</div>
					<div class="comment-item-tools">
						<div class="comment-item-addr">
							{{item.ip_city}}
						</div>
						<div class="comment-item-time">
							{{item.timeago}}
						</div>
					</div>
					<div @click="reply(item.id,item.nickname)" class="comment-item-content bd-mp-5">
						{{item.content}}
					</div>
					<div  v-if="item.child && Object.keys(item.child).length>0">
						<div class="bd-mp-5" v-for="(cc,ii) in item.child" :index="ii">
							<div class="flex mgb-5">
								<div  @click="goHome(cc.userid)"  class="cl2 f12 pointer">
									::{{cc.nickname}}
								</div>
								<div class="flex-1"></div>
								<div class="comment-item-time">
									{{cc.timeago}}
								</div>
							</div>
							<div class="cl2 f12">
								{{cc.content}}
							</div>
							
						</div>
					</div>
				</div>
				
				<div v-if="isadmin" class="comment-item-del">
					<div @click="del(item)" class="btn btn-mini btn-danger iconfont icon-delete"></div>
				</div>
			</div>
			
		</div>
		
		<div class="loadMore" @click="getList()" v-if="per_page>0">加载更多</div>
	</div>
	<div class="h60"></div>
	<div class="comment-formbox">
		<div class="comment-input-btn" v-if="cmBtn" @click="formShow=true;cmBtn=false" id="comment-btn">写跟帖</div>
		<form class="comment-formbox-form flex-col" v-if="formShow" id="comment-formbox-form">
			<textarea  v-model="content" id="comment-content" class="comment-formbox-textarea"></textarea>
			<div class="comment-formbox-btns">
				
				<div class="comment-formbox-bt btn-light" @click="cancel">取消</div>
				<div class="comment-formbox-bt btn-primary" @click="submit">评论</div> 
			</div>
		</form>
	</div>
</div>

 
<script>
  
    var comment_objectid = '<?php echo $this->_var['comment_objectid']; ?>';
    var comment_tablename = '<?php echo $this->_var['comment_tablename']; ?>';
    var comment_f_userid = "<?php echo $this->_var['comment_f_userid']; ?>";
	var comment_pid=0;
 

</script>
