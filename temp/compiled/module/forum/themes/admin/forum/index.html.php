<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>

	<body>
		<div class="shd"><?php echo $this->_var['type_name']; ?></div>
		<div class="main-body">
			<div id="searchbox" class="search-form">
				<form id="searchform" action="/moduleadmin.php" autocomplete="off">
					<input type="hidden" name="m" value="forum" />
					<input type="hidden" name="type" value="<?php echo $this->_var['type']; ?>" /> 
					ID <input type="text" class="w50" name="id" value="<?php echo intval($_GET['id']); ?>" />
					主题 <input type="text" class="w150" name="title" value="<?php echo $_GET['title']; ?>" />
					板块
					<select name="gid" id="gid" class="w150">
						<option value="0">请选择</option>
						<?php $_from = $this->_var['grouplist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<option value="<?php echo $this->_var['c']['gid']; ?>" <?php if (get ( 'gid' ) == $this->_var['c']['gid']): ?> selected="selected" <?php endif; ?>><?php echo $this->_var['c']['title']; ?> </option> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </select>
						 分类 <select name="catid" id="catid" class="w150">
						<option value="0">请选择</option>
						<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if (get ( 'catid' ) == $this->_var['c']['catid']): ?> selected="selected" <?php endif; ?>><?php echo $this->_var['c']['title']; ?> </option> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						 </select> 
						 用户：<input class="w100" type="text" name="nickname" value="<?php echo html($_GET['nickname']); ?>" />
						<input type="checkbox" <?php if (get ( "isrecommend" ) == 1): ?>checked<?php endif; ?> name="isrecommend" value="1" />推荐
						<button type="submit" class="btn">搜索</button>

				</form>
			</div>
			<form id="cForm">
				<table class='tbs' width='100%'>
					<thead>
						<tr>
							<td>id</td>
							<td>主题</td>

							<td>图片</td>
							<td>类别</td>
							<td>作者</td>
							<td>状态</td>
							<td>推荐</td>
							<td>红包</td>
							<td>金币</td>
							<td>操作</td>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<tr>
							<td><?php echo $this->_var['c']['id']; ?><input type="checkbox" class="ids" name="ids[]" value="<?php echo $this->_var['c']['id']; ?>" /></td>
							<td><?php echo $this->_var['c']['title']; ?></td>
							<td>
								<?php if ($this->_var['c']['imgurl']): ?>
								<img class="w60" src="<?php echo images_site($this->_var['c']['imgurl']); ?>.100x100.jpg">
								<?php else: ?>
								无图
								<?php endif; ?>

							</td>
							<td><?php echo $this->_var['c']['gid_name']; ?>/<?php echo $this->_var['c']['cat_name']; ?></td>
							<td><?php echo $this->_var['c']['nickname']; ?></td>
							<td>
								<div class="<?php if ($this->_var['c']['status'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=forum&a=status&id=<?php echo $this->_var['c']['id']; ?>&ajax=1"></div>
							</td>
							<td>
								<div class="<?php if ($this->_var['c']['isrecommend'] == 1): ?>yes<?php else: ?>no<?php endif; ?> js-toggle-status" url="/moduleadmin.php?m=forum&a=recommend&id=<?php echo $this->_var['c']['id']; ?>&ajax=1"></div>
							</td>
							<td>
								<div class="cl-money pointer js-add-money" v="<?php echo $this->_var['c']['id']; ?>"><span class="cl-money money-num<?php echo $this->_var['c']['id']; ?>"><?php echo $this->_var['c']['money']; ?></span>元</div>
							</div>
							<td>
								<div class="cl-money pointer js-add-gold" v="<?php echo $this->_var['c']['id']; ?>"><span class="cl-money gold-num<?php echo $this->_var['c']['id']; ?>"><?php echo $this->_var['c']['gold']; ?></span>个</div>
							</div>
							<td><a href="moduleadmin.php?m=forum&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a>


								<a href="/module.php?m=forum&a=show&id=<?php echo $this->_var['c']['id']; ?>" target="_blank">查看</a>
								<a href="javascript:;" class="js-delete" url="moduleadmin.php?m=forum&a=delete&ajax=1&id=<?php echo $this->_var['c']['id']; ?>">删除</a>
								<div class="btn-mini btn-danger js-join-blacklist" userid="<?php echo $this->_var['c']['userid']; ?>">拉黑</div>
								<div class="btn-mini btn-danger js-forbid-post" userid="<?php echo $this->_var['c']['userid']; ?>">禁言</div>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</tbody>
				</table>
				<div class="flex flex-ai-center pdt-5">
					<input type="checkbox" class="chkall" />&nbsp;

					板块：
					<select name="gid" id="gid2" class="w150">
						<option value="0">请选择</option>
						<?php $_from = $this->_var['grouplist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<option value="<?php echo $this->_var['c']['gid']; ?>" <?php if (get ( 'gid' ) == $this->_var['c']['gid']): ?> selected="selected" <?php endif; ?>><?php echo $this->_var['c']['title']; ?> </option> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </select>
						 分类：<select name="catid" id="catid2" class="w100 mgr-5">
						<option value="0">请选择</option>
						<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
						<option value="<?php echo $this->_var['c']['catid']; ?>" <?php if (get ( "catid" ) == $this->_var['c']['catid']): ?>selected<?php endif; ?>><?php echo $this->_var['c']['title']; ?> </option>
						<?php if ($this->_var['c']['child']): ?> 
							<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?> 
							<option value="<?php echo $this->_var['cc']['catid']; ?>" <?php if (get ( "catid" ) == $this->_var['cc']['catid']): ?>selected<?php endif; ?>>|--<?php echo $this->_var['cc']['title']; ?> </option>
						 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
						 <?php endif; ?> 
						 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
						 </select> 
						 <div class="btn mgr-10" id="changeCategory">修改分类</div>
				聚合：
				<select name="tagid" class="w100 mgr-5">
					<option value="0">请选择</option>
					<?php $_from = $this->_var['taglist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
					<option value="<?php echo $this->_var['c']['tagid']; ?>"><?php echo $this->_var['c']['title']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
				<div class="btn mgr-10" id="changeGroup">聚合产品</div>
				<div class="btn mgr-10" id="delAll">删除</div>
		</div>

		</form>
		<div><?php echo $this->_var['pagelist']; ?></div>
		<div class="modal-group" id="goldModal">
			<div class="modal-mask" onclick="$('#goldModal').hide()"></div>
			<div class="modal">
				<div class="modal-header">
				<div class="modal-title">追加金币</div>
				</div>
				<div class="input-flex">
					<div class="input-flex-label">金币</div>
					<input type="text" id="js-gold-num" class="input-flex-text" />
				</div>
				<div  class="btn-row-submit" id="js-send-gold">发放奖励</div>
			</div>
		</div> 
		</div>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="/plugin/laydate/laydate.js"></script>
		
		<script src="<?php echo $this->_var['skins']; ?>forum/index.js"></script>
	</body>
</html>
