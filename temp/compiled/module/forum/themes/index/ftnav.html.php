<a target="_blank" href="https://www.deituicms.com" class="flex flex-center pd-10 f12 cl3">
	由deituicms提供技术支持
	
</a>
<div class="footer-row"></div>
<div class="footer">
	<div gourl="/module.php?m=forum" class="footer-item icon-home <?php if ($this->_var['ftnav'] == 'index'): ?>footer-active<?php endif; ?>">首页</div>
	<div gourl="/module.php?m=forum_group" class="footer-item icon-cascades  <?php if ($this->_var['ftnav'] == 'forum_group'): ?>footer-active<?php endif; ?>">版块</div>
	<div gourl="/module.php?m=forum&a=add" class="footer-item footer-add">
		 
		发布
	</div>
	<div  gourl="/module.php?m=forum_notice" class="footer-item icon-message_light  <?php if ($this->_var['ftnav'] == 'forum_notice'): ?>footer-active<?php endif; ?>">消息<span id="ft-msg-num" style="display:none;" class="footer-item-num"></span></div>
	<div gourl="/module.php?m=forum&a=user" class="footer-item icon-my_light <?php if ($this->_var['ftnav'] == 'user'): ?>footer-active<?php endif; ?>">我的</div>
</div>