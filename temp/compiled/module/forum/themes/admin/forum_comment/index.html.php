<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<?php echo $this->fetch('forum_comment/nav.html'); ?>
		<div class="main-body">
			<div id="searchbox" class="search-form">
				<form id="searchform" action="/moduleadmin.php" autocomplete="off">
					<input type="hidden" name="m" value="forum_comment">
					ID <input type="text" class="w50" name="id" value="<?php echo intval($_GET['id']); ?>" />
					主题 <input type="text" class="w150" name="title" value="<?php echo $_GET['title']; ?>" />
					用户：<input class="w100" type="text" name="nickname" value="<?php echo html($_GET['nickname']); ?>" />

						<button type="submit" class="btn">搜索</button>

				</form>
			</div>
			<table class="tbs">
				<thead>
					<tr>
						<td>id</td>
						<td>作者</td>
						<td>状态</td>
						<td>创建时间</td>

						<td>内容</td>

						<td>操作</td>
					</tr>
					</tr>
				</thead> <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<tr>
					<td><?php echo $this->_var['c']['id']; ?></td>

					<td><?php echo $this->_var['c']['nickname']; ?></td>
					<td>
						<div class="<?php if ($this->_var['c']['status'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=forum_comment&a=status&id=<?php echo $this->_var['c']['id']; ?>&ajax=1"></div>
					</td>
					<td><?php echo $this->_var['c']['createtime']; ?></td>

					<td><?php echo $this->_var['c']['content']; ?></td>

					<td>
						<a href="javascript:;" class="js-delete" url="/moduleadmin.php?m=forum_comment&a=delete&ajax=1&id=<?php echo $this->_var['c']['id']; ?>">删除</a>
						<div class="btn-mini btn-danger js-join-blacklist" userid="<?php echo $this->_var['c']['userid']; ?>">拉黑</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</table>
			<div><?php echo $this->_var['pagelist']; ?></div>
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script>
			$(document).on("click", ".js-join-blacklist", function() {
				var userid = $(this).attr("userid");
				$.post("<?php echo APPADMIN; ?>?m=blacklist&a=add&ajax=1", {
					userid: userid
				}, function(res) {
					skyToast(res.message);

				}, "json");
			})
		</script>
	</body>
</html>
