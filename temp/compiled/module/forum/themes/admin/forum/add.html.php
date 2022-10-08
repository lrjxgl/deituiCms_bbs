<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
 
<div class="tabs-border">
	<a class="item" href="/moduleadmin.php?m=forum">帖子管理</a>
	<a class="item active" href="/moduleadmin.php?m=forum&a=add">帖子添加</a>
</div>

<div class="main-body ">
 
 
<?php if ($this->_var['data']['catid']): ?>
<div class="index-hd"><a href="/module.php?m=forum&a=show&id=<?php echo $this->_var['data']['id']; ?>" target="_blank" class="btn btn-success">查看前台</a></div> 
<?php endif; ?> 
<form method="post" id="data-form" action="/moduleadmin.php?m=forum&a=save">
<input type="hidden" name="id" value="<?php echo $this->_var['data']['id']; ?>" />
 
<table  class="table-add">
  <tr>
    <td   > 标题：</td>
    <td width=""><input name="title" type="text" id="title" value="<?php echo $this->_var['data']['title']; ?>" size="80"></td>
  </tr>
	
  <tr>
    <td >板块分类：</td>
    <td>
			<select name="gid" id="gid" class="w150">
			<option value="0">请选择</option>
			<?php $_from = $this->_var['grouplist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
									<option value="<?php echo $this->_var['c']['gid']; ?>" <?php if ($this->_var['data']['gid'] == $this->_var['c']['gid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</select>
			
    <select name="catid" id="catid" class="w150">
    <option value="0">请选择</option>
    <?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
        <option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['title']; ?></option>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
    
    
    
    </td>
  </tr>
  
 
	
 
   
  <tr>
    <td >描述：</td>
    <td><textarea name="description" id="description" class="w600 h40"><?php echo $this->_var['data']['description']; ?></textarea></td>
  </tr>
  <tr>
		<td >状态：</td>
		<td>
			<input type="radio" <?php if ($this->_var['data']['status'] == 1): ?> checked=""<?php endif; ?> name="status" value="1" /> 显示
			<input type="radio" <?php if ($this->_var['data']['status'] != 1): ?> checked=""<?php endif; ?> name="status"  value="4"/> 隐藏
		</td>
   	</tr>
   	
   	<tr>
		<td >推荐：</td>
		<td>
			<input type="radio" <?php if ($this->_var['data']['isrecommend'] == 1): ?> checked=""<?php endif; ?> name="isrecommend" value="1" /> 推荐
			<input type="radio" <?php if ($this->_var['data']['isrecommend'] != 1): ?> checked=""<?php endif; ?> name="isrecommend"  value="0"/> 不推荐
		</td>
   	</tr>
   
	
	<tr>
		<td>标签</td>
		<td>
			<input type="text" name="tags" value="<?php echo $this->_var['data']['tags']; ?>" style="width: 200px;" /> (多个标签使用空格隔开)
		</td>
	</tr>
	<tr>
		<td>图集</td>
		<td>
			<input type="hidden" name="imgsdata" id="imgsdata" value="<?php echo $this->_var['data']['imgsdata']; ?>" />
			<div class="upimg-box uploader-imgsdata-imgslist js-zzimg-album">
				<input  type="file"  multiple="" class="none uploader-imgsdata-file" />
				<div class="upimg-btn">
					<div class="upimg-btn-icon"></div>
					
				</div>
				<?php $_from = $this->_var['imgsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
				<div class="upimg-item uploader-imgsdata-img js-zzimg" data-src="<?php echo $this->_var['c']['trueimgurl']; ?>" v="<?php echo $this->_var['c']['imgurl']; ?>" trueimg="<?php echo $this->_var['c']['trueimgurl']; ?>">
					<img class="upimg-img" src="<?php echo $this->_var['c']['trueimgurl']; ?>.100x100.jpg"/>
					<i class="upimg-del   js-imgdel"></i>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				 
			</div>
		</td>
	</tr>
  
</table>

<div  id="submit" class="btn-row-submit"> 保存</div>
</form>
</div>
<?php echo $this->fetch('footer.html'); ?>
<script>
 
$(function(){
	$(document).on("change","#gid",function(){
		var gid=$(this).val();
		$.get("/moduleadmin.php?m=forum_group&a=catlist&ajax=1&gid="+gid,function(data){
			var html='<option value="0">请选择</option>';
			for(var i=0;i<data.data.length;i++){
				html=html+'<option value="'+data.data[i].catid+'">'+data.data[i].title+'</option>';
			}
			$("#catid").html(html);
		},"json")
	})
	$(document).on("click","#submit",function(){
		var form=$(this).parents("form");
		var imgs=$(".uploader-imgsdata-img");
		 
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
				goBack();
			}
		},"json")
	
	})  
})	
</script>
<script src="/plugin/lrz/lrz.bundle.js"></script>
<script src="/static/admin/js/upload.js"></script>
<script src="<?php echo $this->_var['skins']; ?>forum/upload-data.js"></script>
 
</body>
</html>