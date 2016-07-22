<?php /* Smarty version Smarty-3.1.3, created on 2011-12-24 15:56:59
         compiled from "templates/check_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9952108974e985a282eb0b4-73958943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df01d783fb918a9201ee8493521b3ef94ee54ac9' => 
    array (
      0 => 'templates/check_users.tpl',
      1 => 1324734796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9952108974e985a282eb0b4-73958943',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_4e985a283386d',
  'variables' => 
  array (
    'mess' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e985a283386d')) {function content_4e985a283386d($_smarty_tpl) {?><html>
<head>
	<meta http-equiv="Content-type"; content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/check_user.css" type="text/css"/>		
	<link rel="stylesheet" href="css/jquery-ui-1.8.16.custom.css" type="text/css" media="all"/>	
	<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="js/dialogs.js" type="text/javascript"></script>
	<title>Authorization</title>
</head>	
<style type="text/css">
	
</style>
<body>

	<form action="index.php" method="post">
    
	<div id="main" class="ui-corner-all">
		<div id="block_pad">	
			<h1>"HOSTLIFE" work-journal</h1>
			
			<div id="login_field">
				<label for="login_check">Логин:</label>
				<input type="text" name="login_check" id="login_check" class="text ui-widget-content ui-corner-all"/>
			</div>
			
			<div id="password_field">								
				<label for="password_check">Пароль:</label>
				<input type="password" name="password_check" id="password_check" class="text ui-widget-content ui-corner-all"/>
			</div>
			
			<div id="button_field">
				<button  id="check">Войти</button>
			</div>
			
			<div id="content"><?php echo $_smarty_tpl->tpl_vars['mess']->value;?>
</div>
		</div>
	</div>
	
	</form>
</body><?php }} ?>