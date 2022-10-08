<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
<div class="tabs-border">
	<div><?php echo $this->_var['group']['title']; ?>::</div>
	<div class="item active">帖子列表</div>
 
</div>
<div class="main-body">
 <table class="tbs">
<thead>  <tr>
   <td>id</td>
   
   <td>帖子</td>
   <td>排序</td>
<td>操作</td></tr>
  </tr>
</thead> <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
    
   <td><?php echo $this->_var['c']['title']; ?></td>
   <td>
		 <div class="flex">
		<input class="js-order w60" type="text" gpid="<?php echo $this->_var['c']['id']; ?>" value="<?php echo $this->_var['c']['orderindex']; ?>" />
		</div>
	 </td>
<td>
 <a href="/module.php?m=forum&a=show&id=<?php echo $this->_var['c']['objectid']; ?>" target="_blank">查看</a> 
 <a href="javascript:;" class="js-delete" url="/moduleadmin.php?m=forum_tags_index&a=delete&ajax=1&id=<?php echo $this->_var['c']['id']; ?>">删除</a>
 </td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
<script>
	$(function(){
		$(document).on("change",".js-order",function(){
			var gpid=$(this).attr("gpid");
			var orderindex=$(this).val();
			$.post("/moduleadmin.php?m=forum_tags_index&a=orderindex&ajax=1",{
				id:gpid,
				orderindex:orderindex
			},function(res){
				skyToast(res.message);
			},"json");
		})
	})
</script>
</body>
</html>