<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
<?php echo $this->fetch('open_wxnative/nav.html'); ?>
 <table class="tbs">
<thead>  <tr>
   <td>id</td>
   <td>名称</td>
    
   <td>appid</td>
  
   <td>状态</td>
<td>操作</td></tr>
  </tr>
</thead> <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
    
   <td><?php echo $this->_var['c']['appid']; ?></td>
    
   <td><?php echo $this->_var['c']['status']; ?></td>
<td><a href="admin.php?m=open_wxnative&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a> 


<a href="javascript:;" class="js-delete" url="admin.php?m=open_wxnative&a=delete&ajax=1&id=<?php echo $this->_var['c']['id']; ?>">删除</a></td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>