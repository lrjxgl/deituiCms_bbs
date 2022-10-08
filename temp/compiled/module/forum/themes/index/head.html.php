<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<?php if (! isset ( $this->_var['site'] )): ?>
<?php $this->assign("site",M("site")->get()); ?>
<?php endif; ?>
<title><?php if (isset ( $this->_var['seo'] )): ?><?php echo $this->_var['seo']['title']; ?><?php else: ?><?php echo $this->_var['site']['title']; ?><?php endif; ?></title>
<link href="//at.alicdn.com/t/font_811242_bl1740adjkh.css" rel="stylesheet" />
<link href="/plugin/dt-ui/dt-ui-h5.css?v4" rel="stylesheet" />
<link href="/index.php?m=skinscolor" rel="stylesheet" />
<link href="<?php echo $this->_var['skins']; ?>css/app.css" rel="stylesheet" />

</head>
