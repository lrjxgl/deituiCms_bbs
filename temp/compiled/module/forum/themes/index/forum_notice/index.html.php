<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<style>
		.pm-head {
			width: 40px;
			height: 40px;
			margin-right: 5px;
		}
	
		.pm-l-msg,
		.pm-r-msg {
	
			color: #646464;
			font-size: 14px;
			padding: 5px;
			box-sizing: border-box;
			background-color: #eee;
			border-radius: 5px;
			 
		}
	
		.pm-l-msg {
			margin-right: 80px;
		}
	
		.pm-r-msg {
			margin-left: 30px;
		}
	</style>
	<body>
		 
		<div class="header">
			<div class="header-back"></div>
			<div class="header-title">我的消息</div>
		</div>
		<div class="header-row"></div>
		<div id="App" class="main-body">
			<div class="tabs-border">
				<div @click="setTab('notice')" :class="tab=='notice'?'tabs-border-active':''" class="tabs-border-item">我的消息</div>
				<div @click="setTab('pm')" :class="tab=='pm'?'tabs-border-active':''" class="tabs-border-item">我的私信</div>
				<div @click="setTab('sysmsg')" :class="tab=='sysmsg'?'tabs-border-active':''" class="tabs-border-item">系统通知</div>	 
			</div>
			<div v-if="tab=='pm'">
				<page-pm></page-pm>
			</div>
			<div v-if="tab=='notice'">
				<page-notice></page-notice>
			</div>
			
			<div v-if="tab=='sysmsg'">
				 
				<page-sysmsg></page-sysmsg>
			</div>
			 
		</div>
	<?php $this->assign('ftnav','forum_notice'); ?>	
	<?php echo $this->fetch('ftnav.html'); ?>	
	<?php echo $this->fetch('footer.html'); ?> 
	<script src="/plugin/dt-ui/skyJs.js"></script>
	<script src="<?php echo $this->_var['skins']; ?>forum_notice/sysmsg.js"></script>
	<script src="<?php echo $this->_var['skins']; ?>forum_notice/notice.js"></script>
	<script src="<?php echo $this->_var['skins']; ?>forum_notice/pm.js"></script>
	<script src="<?php echo $this->_var['skins']; ?>forum_notice/index.js"></script>
	</body>
</html>
