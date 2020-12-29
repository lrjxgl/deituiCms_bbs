<div class="footer-row"></div>
<div class="footer">
	<div gourl="/module.php?m=forum" class="footer-item icon-home <?php if (get ( 'm' ) == 'forum' && get ( 'a' ) == 'default'): ?>footer-active<?php endif; ?>">首页</div>
	<div gourl="/module.php?m=forum_group" class="footer-item icon-cascades  <?php if (get ( 'm' ) == 'forum_group'): ?>footer-active<?php endif; ?>">版块</div>
	<div gourl="/module.php?m=forum&a=add" class="footer-item footer-add">
		 
		发布
	</div>
	<div gourl="/module.php?m=forum&a=search" class="footer-item icon-search  <?php if (get ( 'a' ) == 'search'): ?>footer-active<?php endif; ?>">搜索</div>
	<div gourl="/module.php?m=forum&a=user" class="footer-item icon-my_light <?php if (get ( 'a' ) == 'user'): ?>footer-active<?php endif; ?>">我的</div>
</div>