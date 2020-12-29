<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
<?php echo $this->fetch('forum_tags/nav.html'); ?>
<div class="main-body">
 <table class="tbs">
<thead>  <tr>
   <td>id</td>
   <td>名称</td>
   <td>标签</td>
   <td>记录数</td>
   
<td>操作</td></tr>
  </tr>
</thead> <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['tagid']; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
   <td><?php echo $this->_var['c']['gkey']; ?></td>
   <td><?php echo $this->_var['c']['gnum']; ?></td>
  
<td>
	<a href="/module.php?m=forum_tags_index&tagid=<?php echo $this->_var['c']['tagid']; ?>" target="_blank">查看</a> 
	<a href="/moduleadmin.php?m=forum_tags&a=add&tagid=<?php echo $this->_var['c']['tagid']; ?>">编辑</a>
 <a href="/moduleadmin.php?m=forum_tags_index&tagid=<?php echo $this->_var['c']['tagid']; ?>">帖子管理</a> 
 <a href="javascript:;" class="js-delete" url="/moduleadmin.php?m=forum_tags&a=delete&tagid=<?php echo $this->_var['c']['tagid']; ?>">删除</a></td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>