<?php /* Smarty version Smarty-3.1.3, created on 2011-12-12 16:26:02
         compiled from "templates/main_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12684685644ec7a84e035ec0-53464140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5c6df24b0966a9c2a3cc3f249c82d294fa62678' => 
    array (
      0 => 'templates/main_user.tpl',
      1 => 1323699961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12684685644ec7a84e035ec0-53464140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_4ec7a84e10dfa',
  'variables' => 
  array (
    'machines' => 0,
    'item' => 0,
    'employeeid' => 0,
    'employee' => 0,
    'journal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec7a84e10dfa')) {function content_4ec7a84e10dfa($_smarty_tpl) {?><html>

<head>
	<meta http-equiv="Content-type"; content="text/html; charset=utf-8">
	<title>Journal of shifts</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" media="all"/>	
	<link rel="stylesheet" href="css/jquery-ui-1.8.16.custom.css" type="text/css" media="all"/>	
	<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="js/dialogs.js" type="text/javascript"></script>
	<script src="js/sort.js" type="text/javascript"></script>
	
</head>	

<body>

	<div id="dialog-record-user" title="Add record">
		<form>
		<p class="validateTips"><em>Please, enter data!</em></p>
		<fieldset>
			<label for="machines_user">Machine</label>
			<select name="machines_user" id="machines_user" class="text ui-widget-content ui-corner-all" >
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['machines']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
				<?php } ?>
			</select>
			
			<label for="claim_text_user">Text of claim (optional)</label>
			<input type="text" name="claim_text_user" id="claim_text_user" class="text ui-widget-content ui-corner-all"/>
			
			<label for="shift_user">Shift</label>
			<select name="shift_user" id="shift_user" class="text ui-widget-content ui-corner-all" >
				<option value="1">took</option>
				<option value="2">passed</option>
			</select>
			
			<input type="hidden" name="employee_id" id="employee_id"  class="text ui-widget-content ui-corner-all" value="<?php echo $_smarty_tpl->tpl_vars['employeeid']->value;?>
"/>	
		</fieldset>
		</form>
	</div>
	
	
	
	<div class="demo">
	<b class='text ui-widget-content ui-corner-all' id='menu_product' >Menu:</b> <span style='cursor: pointer'><a  style="color:blue";  id="make_record_user"  class='text ui-widget-content ui-corner-all'>[Add record] </a><span style='cursor: pointer'><a  href='?a=logout' style="color:blue; " id="log_out"    class='text ui-widget-content ui-corner-all'>[Log out] </a></span><br>
	
	
	<center><h1><font style="font-family:Tahoma; font-size:15pt;font-size:26pt" >Hello,"<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" </h1></center>
	<hr class="hr"><br>
			<center><h2><font style="font-family:Tahoma; font-size:15pt;font-size:13pt" >Journal of shifts</h2></center>
	
			<table  id="tabl3" class="tablesorter" >
			<thead>
				<th width="5%" >Date-Time</th>
				<th width="15%" >Employee Name</th>
				<th width="5%" >Machine</th>
				<th width="15%" >Claims</th>
				<th width="5%" >Shift</th>
			
			</thead>
			<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['journal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
								<tr>	
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['datetime'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['name_machine'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['claims'];?>
</td>
									<td width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['shift'];?>
</td>
								</tr>
							
					<?php } ?>
				

			</tbody>
			</table>
</form>
</body>
</html>






<?php }} ?>