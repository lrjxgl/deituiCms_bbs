<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body class="fullBody bg-fff">
		<div class="header-back-fixed goBack"></div>
		<div class="header-row"></div>
		<div class="main-body" id="App">
			<div v-if="page=='login'">
				<div class="flex-center pd-10 bg-fff">
					<image class="wh-100 bd-radius-50" src="<?php echo $this->_var['site']['logo']; ?>.100x100.jpg"></image>

				</div>
				<input type="hidden" id="backurl" name="backurl" value="<?php echo $this->_var['backurl']; ?>" />
					
				<div class="input-flex">
					<div class="input-flex-label">手机</div>
					<input type="text" class="input-flex-text" id="telephone" name="telephone" placeholder="请输入手机号码" />
				</div>
				<div class="input-flex">
					<div class="input-flex-label">密码</div>
					<input type="password" class="input-flex-text" id="password" type="text" placeholder="请输入密码" passowrd />
				</div>
				<div class="row-box">
					<div class="btn-row-submit" id="login-submit">登录</div>
					<div class="flex pdl-10 pdr-10">
						<a class="cl2 mgb-10" @click="setPage('findpwd')">找回密码</a>
						<div class="flex-1"></div>
						<a class="mgb-10 cl2"  @click="setPage('reg')">立即注册</a>
						
					</div>
				</div>
				<?php if (INWEIXIN): ?>
				<div class="otherBox mgb-20">
					<div class="otherBox-line"></div>
					<div class="otherBox-text">其它方式登录</div>
				</div>
				<div class="flex flex-center mgb-20">
					<div gourl="/index.php?m=open_weixin&a=Geturl&backurl=<?php echo urlencode($this->_var['backurl']); ?>" class="btn btn-round bg-success iconfont icon-weixin"></div>
				</div>
				<?php endif; ?>
			</div>
			<div v-else-if="page=='reg'">
				<div @click="setPage('login')" class="header-back-fixed"></div>
				<div class="flex-center pd-10 bg-fff">
					<image class="wh-100 bd-radius-50" src="<?php echo $this->_var['site']['logo']; ?>.100x100.jpg"></image>
					
				
				</div>
				<form id="regForm">
				
				<div class="input-flex">
					<div class="input-flex-label">手机</div>
					<input class="input-flex-text" id="telephone" name="telephone" placeholder="请输入手机号码" />
				</div>
				<div class="input-flex">					
					<div class="input-flex-label">验证码</div>					 
					<input type="text" name="yzm" class="input-flex-text">				 
					<div class="input-flex-btn" id="sendSms2">获取验证码</div>
				</div>
				<div class="input-flex">
					<div class="input-flex-label">昵称</div>
					<input class="input-flex-text" name="nickname" placeholder="请输入昵称" />
				</div>
				<div class="input-flex">
					<div class="input-flex-label">密码</div>
					<input class="input-flex-text" name="password" type="password" placeholder="请输入密码" type="password" />
				</div>
				<div class="input-flex">
					<div class="input-flex-label">重复密码</div>
					<input class="input-flex-text" name="password2" placeholder="请再次输入密码" type="password" />
				</div>
				<?php if ($this->_var['reg_invitecode']): ?>
				<div class="input-flex">
					<div class="input-flex-label">邀请码</div>
					<input class="input-flex-text" name="invitecode" placeholder="请输入邀请码" />
				</div>
				<?php endif; ?>
				<div class="row-box">
					<button type="button" id="reg-submit" class="btn-row-submit">立即注册</button>
					<div class="flex-center">
						<a class="mgb-10 cl2" @click="setPage('login')" >已有账号？立即登录</a>
						
					</div>
				</div>
				</form>
			</div>
			<div v-else-if="page=='findpwd'">
				<div @click="setPage('login')" class="header-back-fixed"></div>
				<div class="flex-center pd-10 bg-fff">
					<image class="wh-100 bd-radius-50" src="<?php echo $this->_var['site']['logo']; ?>.100x100.jpg"></image>
					
				
				</div>
				<form id="fdForm">
					<div class="input-flex">
						<div class="input-flex-label">手机</div>
						<input class="input-flex-text" id="telephone" name="telephone" placeholder="请输入手机号码" />
					</div>
					<div class="input-flex">					
						<div class="input-flex-label">验证码</div>					 
						<input type="text" name="yzm" class="input-flex-text">				 
						<div class="input-flex-btn" id="sendSms">获取验证码</div>
					</div>
				 
					<div class="input-flex">
						<div class="input-flex-label">密码</div>
						<input class="input-flex-text" name="password" type="password" placeholder="请输入密码" type="password" />
					</div>
					<div class="input-flex">
						<div class="input-flex-label">重复密码</div>
						<input class="input-flex-text" name="password2" placeholder="请再次输入密码" type="password" />
					</div>
					<div class="btn-row-submit" id="findpwd-submit">确认修改</div>
				</form>
			</div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="<?php echo $this->_var['skins']; ?>login/index.js"></script>
		<style>
			.otherBox {
			position: relative;
			height: 36px;
		}
		
		.otherBox-line {
			width: 100%;
			height: 1px;
			background-color: #d0d0d0;
			top: 14px;
			position: absolute;
		}
		
		.otherBox-text {
			background-color: #fff;
			text-align: center;
			padding: 0px 11px;
			line-height: 36px;
			position: absolute;
			width: 120px;
			left: 50%;
			margin-left: -60px;
			color: #646464;
		
		}
		</style>
		 
	</body>
</html>
