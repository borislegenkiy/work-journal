<?php /* Smarty version Smarty-3.1.3, created on 2011-11-19 14:43:18
         compiled from "templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13411804004e985a2d21dec5-97236846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c6baab8db5b147146df4d4d7f083fab98802ca' => 
    array (
      0 => 'templates/main.tpl',
      1 => 1321706399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13411804004e985a2d21dec5-97236846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_4e985a2d31997',
  'variables' => 
  array (
    'edit_employees' => 0,
    'employees' => 0,
    'item' => 0,
    'show_service' => 0,
    'journal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e985a2d31997')) {function content_4e985a2d31997($_smarty_tpl) {?><html>

<head>
	<meta http-equiv="Content-type"; content="text/html; charset=utf-8">
	<title>Journal of shifts</title>
	<link rel="stylesheet" href="css/new.css" type="text/css" />	
	<link rel="stylesheet" href="css/jquery-ui-1.8.16.custom.css" type="text/css" media="all"/>	
	<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="js/dialogs.js" type="text/javascript"></script>
	<script src="js/sort.js" type="text/javascript"></script>
	
</head>	

<body>
	<div id="dialog-employee" title="Add employee">
		<form>
		<p class="validateTips"><em>Please, enter data!</em></p>
		<fieldset>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all"/>
			
			<label for="post">Post</label>
			<input type="text" name="post" id="post" class="text ui-widget-content ui-corner-all"/>
			
			<label for="login">Login</label>
			<input type="text" name="login" id="login" class="text ui-widget-content ui-corner-all"/>
			
			<label for="password">Password</label>
			<input type="text" name="password" id="password"  class="text ui-widget-content ui-corner-all" />
		</fieldset>
		</form>
	</div>
	
	<div id="dialog-edit-employee" title="Edit employee">
		<form>
		<p class="validateTips"><em>Please, edit data!</em></p>
		<fieldset>
			<label for="name_edit">Name</label>
			<input type="text" name="name_edit" id="name_edit" class="text ui-widget-content ui-corner-all" value="<?php echo $_smarty_tpl->tpl_vars['edit_employees']->value['name'];?>
" disabled="true"/>
			
			<label for="post_edit">Post</label>
			<input type="text" name="post_edit" id="post_edit" class="text ui-widget-content ui-corner-all" value="<?php echo $_smarty_tpl->tpl_vars['edit_employees']->value['post'];?>
"/>
			
			<label for="login_edit">Login</label>
			<input type="text" name="login_edit" id="login_edit" class="text ui-widget-content ui-corner-all" value="<?php echo $_smarty_tpl->tpl_vars['edit_employees']->value['login'];?>
"/>
			
			<label for="old_password_edit">Old password</label>
			<input type="text" name="old_password_edit" id="old_password_edit"  class="text ui-widget-content ui-corner-all" />
			
			
			<label for="new_password_edit">New password</label>
			<input type="text" name="new_password_edit" id="new_password_edit"  class="text ui-widget-content ui-corner-all" />
			
			
			<input type="hidden" name="hash" id="hash"  class="text ui-widget-content ui-corner-all" value="<?php echo $_smarty_tpl->tpl_vars['edit_employees']->value['password'];?>
"/>
		</fieldset>
		</form>
	</div>
	
	<div id="dialog-delete-employee" title="Delete employee">
	<p class="validateTips"><em>Select employee,please!</em></p>
		<form>
			<center><h2><em>Employees</em></h2></center>
			<table align="center" border=3 id="users" class="ui-widget ui-widget-content" rules="all" >
			<tr align="center" class="ui-widget-header ">
				<th width="150 px">Name</th>
				<th width="95 px" nowrap><span style="cursor: pointer;"><ins><a  id="select-all-employee">Select</a><ins></span></th>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
					<td><center><input type="checkbox" name="demployees[]" id="demployees" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></center></td>
				<?php } ?>
			</table>
		</form>
	</div>
	
	<div id="dialog-help" title="HELP!!!">
		<p class="validateTips"><em>Information about product!</em></p>
		<form>
		<fieldset>
			</table><br>
			<table align="center" border=3 id="users" class="ui-widget ui-widget-content" rules="all" >
			<tr align="center" class="ui-widget-header ">
				<th width="95 px">Buttons</th>
				<th width="220 px">Action</th>
			</tr>
			<tr>
					<td>Shft+F1</td>
					<td>Dialog 'Add employee'</td>
			</tr>
			<tr>
					<td>Shft+F2</td>
					<td>Dialog 'Delete employee'</td>
			</tr>
			<tr>
					<td>Ctrl+F1</td>
					<td>Dialog 'HELP'</td>
			</tr>	
			</table>
		</fieldset>
		</form>
	</div>
	
	<div class="demo">
	<b class='text ui-widget-content ui-corner-all' id='menu_product' >Menu:</b> <span style='cursor: pointer'><a  style="color:blue";  id="add_employee"  class='text ui-widget-content ui-corner-all'>[Add employee] </a></span><span style='cursor: pointer'><a   style="color:blue; " id="delete_employee"    class='text ui-widget-content ui-corner-all'>[Delete employee] </a></span><span style='cursor: pointer'><a   style="color:blue; " id="help"    class='text ui-widget-content ui-corner-all'>[Help] </a></span><span style='cursor: pointer'><a  href='?a=logout' style="color:blue; " id="log_out"    class='text ui-widget-content ui-corner-all'>[Log out] </a></span><br>
	<hr class="hr"><b class="text ui-widget-content ui-corner-all" id='menu_category'>Employees:</b> <span style='cursor: pointer'></span> 
	
	</span>
	
	<table width="100%">
	<center><h1><font style="font-family:Tahoma; font-size:15pt;font-size:26pt" >Selected employee: "<?php echo $_smarty_tpl->tpl_vars['show_service']->value['name'];?>
" </h1></center>
	<hr class="hr"><br>
	<tr>
	<td width="60%" valign="top">	
			<center><h2><font style="font-family:Tahoma; font-size:15pt;font-size:13pt" >Journal of shifts</h2></center>
			<table  id="tabl1" class="tablesorter" >
			<thead>
			
				<th width="5%" >Data-Time</th>
				<th width="15%" >Employee Name</th>
				<th width="15%" >Claims</th>
				<th width="5%" >Took Shift</th>
			
			</thead>
			<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['journal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['datetime'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['claims'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['shift'];?>
</td>
								</tr>
					<?php } ?>
				</tr>
			</tr>
			</tbody>
			</table>
	</td>
	<td width="15%" valign="top">
	</td>
	<td width="25%" valign="top">
			<center><h2><font style="font-family:Tahoma; font-size:15pt;font-size:13pt" >All employees</h2></center>
			<table  id="tabl2" class="tablesorter" >
			<thead>
				<th width="15%" >Name</th>
				<th width="5%" >Edit</th>
				<th width="5%" >Delete</th>
			</thead>
			<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
									<td width="5%"><center><span style="cursor: pointer;"><a href= "?a=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" style='color:blue' class="text ui-widget-content ui-corner-all" name="eitem[]" id="edit-item">Edit</a></span></center></td>
									<td width="5%"><center><span style="cursor: pointer;"><a href= "?a=del&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" style='color:blue' class="text ui-widget-content ui-corner-all" name="ditem[]" id="edit-item">Delete</a></span></center></td>
								</tr>
					<?php } ?>
				</tr>
			</tr>
			</tbody>
			</table>
	</td>
	</tr>
	</table>
</form>
</body>
</html>






<?php }} ?>