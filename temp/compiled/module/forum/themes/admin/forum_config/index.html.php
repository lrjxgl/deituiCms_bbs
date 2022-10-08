<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<div class="shd">论坛配置</div>
		<div id="App" class="main-body">
			<form  action="/moduleadmin.php?m=forum_config&a=save&ajax=1">
				<table class="table-add">
					<tr>
						<td>热帖版<br/>时间</td>
						<td>
							<input  value="<?php echo $this->_var['fconfig']['phb_post_time']; ?>" name="phb_post_time" class="w100" type="text"/> 天
						</td>
					</tr>
				</table>
				<div class="btn-row-submit js-submit">保存</div>
			</form>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
	</body>
</html>