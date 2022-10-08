<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
	<div class="header">
		<div class="header-back"></div>
		<div class="header-title">实名认证</div>
	</div>
	<div class="header-row"></div>
  <div class="main-body">
<div class="row-box">
 <div class="flex mgb-10">
	  <div class="cl-red">*每次提交都要重新审核！</div>
	  <div class="flex-1"></div>
	  <div class="mgl-10">当前状态：</div>
	  <div class="cl-status"><?php if ($this->_var['user']['is_auth']): ?>已认证<?php else: ?>未认证<?php endif; ?>
	  <?php if ($this->_var['data']['status'] == 0): ?>新认证待审核<?php elseif ($this->_var['data']['status'] == 2): ?>新认证被拒绝<?php endif; ?></div>
 </div>
 

<form method="post" action="/index.php?m=user_auth&a=save">
	<div class="input-flex">
		<div class="input-flex-label input-flex-require">身份证：</div>
		<input  type="text" name="user_card" value="<?php echo $this->_var['data']['user_card']; ?>"  class="input-flex-text"/>
		<span>(审核通过后不可修改)</span>
	</div>
	<div class="input-flex">
		<div class="input-flex-label input-flex-require">姓名：</div>
		<input  type="text" name="truename" value="<?php echo $this->_var['data']['truename']; ?>" class="input-flex-text"/>
		<span>(审核通过后不可修改)</span>
	</div>
	<div class="input-flex flex-ai-center">
		<div class="input-flex-label input-flex-require">本人照片</div>
		<div class="flex-1">
			<div class="upimg-box bg-fff">
				
				<div class="upimg-item <?php if ($this->_var['data']['true_user_head'] == ""): ?>none<?php endif; ?> js-upimg-btn">
					<img class="upimg-img" <?php if ($this->_var['data']['true_user_head']): ?>src="<?php echo $this->_var['data']['true_true_user_head']; ?>.100x100.jpg"<?php endif; ?> >								 
				</div>
				<?php if ($this->_var['data']['true_user_head'] == ""): ?>	 
				<div class="upimg-btn js-upimg-btn">
					<i class="upimg-btn-icon"></i>
				</div>
				<?php endif; ?>
				<input type="hidden" name="true_user_head" value="<?php echo $this->_var['data']['true_user_head']; ?>" class="imgurl" />
				<input style="display: none;" type="file" class="js-upimg-file" name="upimg" id="upimg" /> 
			</div> 
		</div>
	</div>
	<div class="input-flex">
		<div class="input-flex-label">手机：</div>
		<input  type="text" id="telephone" name="telephone" value="<?php echo $this->_var['data']['telephone']; ?>"  class="input-flex-text"/>
		<div id="send-sms" class="input-flex-btn">发送验证码</div>
	</div>
	 <div class="input-flex">
	 	<div class="input-flex-label">验证码：</div>
	 	<input  type="text" id="yzm" name="yzm" value=""  class="input-flex-text"/>
	 	
	 </div> 
	 <div class="flex flex-center">
		 <div class="btn mgr-20 js-submit" url="/">提交认证</div>
		 <div class="btn btn-warning" gourl="/">返回首页</div>
	 </div>
	
</form> 
  
</div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
<script src="/plugin/lrz/lrz.bundle.js"></script>
<script src="/plugin/dt-ui/dt-ui-upload.js"></script>
<script>
	$(function(){
		$(document).on("click","#send-sms",function(){
			var telephone=$("#telephone").val();
			$.ajax({
				url:"/index.php?m=user_auth&a=sendsms&ajax=1",
				dataType:"json",
				type:"POST",
				data:{
					telephone:telephone
				},
				success:function(res){
					skyToast(res.message)
				}
			})
		})
	})
</script>
</body>
</html>
