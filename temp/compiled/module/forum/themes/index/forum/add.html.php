<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>

	<body>
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">帖子发布</div>
		</div>
		<div class="header-row"></div>
		<div class="main-body">
			<form method="post" action="/module.php?m=forum&a=save">
				<input type="hidden" name="id" style="display:none;" value="<?php echo $this->_var['data']['id']; ?>">
				 <input type="hidden" name="catid" value="<?php echo $this->_var['catid']; ?>" />
					<div class="input-flex">
						<div class="input-flex-label input-flex-require">标题：</div>
						<input type="text" class="input-flex-text" name="title" id="title" value="<?php echo $this->_var['data']['title']; ?>">
						
					</div>
					<div class="input-flex">
						<div class="input-flex-label">选择板块</div>
						 
							<select name="gid" id="gid" class="input-flex-select" >
							<option value="0">请选择</option>
							<?php $_from = $this->_var['grouplist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
													<option value="<?php echo $this->_var['c']['gid']; ?>" <?php if ($this->_var['data']['gid'] == $this->_var['c']['gid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select>
							&nbsp;
						<select name="catid" id="catid" class="input-flex-select" >
						<option value="0">请选择</option>
						<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
								<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
						
					</div> 
					<div class="textarea-flex">
						<div class="textarea-flex-label input-flex-require">内容：</div>
						<textarea  class="textarea-flex-text h60" name="description" id="description"><?php echo $this->_var['data']['description']; ?></textarea>
					</div>
				 
					<div class="bg-fff mgb-5">
						<input type="hidden" name="imgsdata" id="imgsdata" value="<?php echo $this->_var['data']['imgsdata']; ?>" />
						<?php echo $this->fetch('inc/uploader-data.html'); ?>
					</div>
					<?php if ($this->_var['payMoney']): ?>
				 <div class="input-flex">
					 <div class="input-flex-label">支付费用</div>
					 <div class="input-flex-txt"><?php echo $this->_var['payMoney']; ?></div>
				 </div>
				 <?php endif; ?>
				<div class="btn-row-submit " id="submit">保存</div>
			</form>

		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="<?php echo $this->_var['skins']; ?>inc/uploader-data.js"></script>
		<script src="/plugin/lrz/lrz.bundle.js"></script>
		<script src="/plugin/dt-ui/dt-ui-upload.js"></script>
		<script src="/plugin/laydate/laydate.js"></script>
		<script>
			laydate.render({
				elem:"#startTime",
				type:"datetime"
			});
			$(document).on("change","#gid",function(){
				var gid=$(this).val();
				$.get("/module.php?m=forum_group&a=catlist&ajax=1&gid="+gid,function(data){
					var html='<option value="0">请选择</option>';
				 
					for(var i=0;i<data.data.length;i++){
						html=html+'<option value="'+data.data[i].catid+'">'+data.data[i].title+'</option>';
					}
					console.log(html);
					$("#catid").html(html);
				},"json")
			})
			var inSubmit=false;
			$(document).on("click","#submit",function(){
				var form=$(this).parents("form");
				var imgs=$(".uploader-imgsdata-img");
				if(inSubmit){
					return false;
				} 
				inSubmit=true;
				setTimeout(function(){
					inSubmit=false;
				},2000);
				if(imgs.length>0){
					var s="";
					for(var i=0;i<imgs.length;i++){
						if(i>0){
							s+=",";
						}
						s+=imgs.eq(i).attr("v");		
					}
					$("#imgsdata").val(s);
				}
				 
				$.post(form.attr("action")+"&ajax=1",form.serialize(),function(res){
					skyToast(res.message);
					if(!res.error){
						setTimeout(function(){
							goBack();
						},1000)
						
					}
				},"json")
			})
		</script>
	</body>
</html>
