<html>

<head>
	<meta http-equiv="Content-type"; content="text/html; charset=utf-8">
	<title>Journal of shifts</title>
	<link rel="stylesheet" href="css/main.css" type="text/css"/>		
	<link rel="stylesheet" href="css/jquery-ui-1.8.16.custom.css" type="text/css" media="all"/>	
	<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="js/dialogs.js" type="text/javascript"></script>
	<script src="js/sort.js" type="text/javascript"></script>
	<script src="json.js" type="text/javascript"></script>
	
</head>	

<body>
	<div id="dialog-employee" title="Add employee">
		
		<p class="validateTips"><em>Please, enter data!</em></p>
		<fieldset>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all"/>
			
			<label for="super_user">Admin</label>
			<input type="checkbox" name="super_user" id="super_user" class="checkbox" value=""  checked=""/><br>
			
			<label for="post">Post</label>
			<input type="text" name="post" id="post" class="text ui-widget-content ui-corner-all"/>
			
			<label for="login">Login</label>
			<input type="text" name="login" id="login" class="text ui-widget-content ui-corner-all"/>
			
			<label for="password">Password</label>
			<input type="text" name="password" id="password"  class="text ui-widget-content ui-corner-all" />
		</fieldset>
		
	</div>
	
	<div id="dialog-machine" title="Add mnachine">
		<form>
		<p class="validateTips"><em>Please, enter data!</em></p>
		<fieldset>
			<label for="name_machine">Name</label>
			<input type="text" name="name_machine" id="name_machine" class="text ui-widget-content ui-corner-all"/>
		</fieldset>
		</form>
	</div>
	
	<div id="dialog-record-admin" title="Add record">
		<form>
		<p class="validateTips"><em>Please, enter data!</em></p>
		<fieldset>
			<label for="machines_admin">Machine</label>
			<select name="machines_admin" id="machines_admin" class="text ui-widget-content ui-corner-all" >
				{foreach $machines as $item}
					<option value="{$item.id}">{$item.name}</option>
				{/foreach}
			</select>
				
			<label for="claim_text_admin">Text of claim (optional)</label>
			<input type="text" name="claim_text_admin" id="claim_text_admin" class="text ui-widget-content ui-corner-all"/>
						
			<label for="shift_admin">Shift</label>
			<select name="shift_admin" id="shift_admin" class="text ui-widget-content ui-corner-all" >
				<option value="1">took</option>
				<option value="2">passed</option>
			</select>
			
			<input type="hidden" name="employee_id" id="employee_id"  class="text ui-widget-content ui-corner-all" value="{$employeeid}"/>
		</fieldset>
		</form>
	</div>
	
	
	<div id="dialog-edit-employee" title="Edit employee">
		<form>
		<p class="validateTips"><em>Please, edit data!</em></p>
		<fieldset>
			<label for="name_edit">Name</label>
			<input type="text" name="name_edit" id="name_edit" class="text ui-widget-content ui-corner-all" value="{$edit_employees['name']}" />
			
			{if $edit_employees['superuser'] eq '0'}
				<label for="super_user_edit">Admin</label>
				<input type="checkbox" name="super_user_edit" id="super_user_edit" class="checkbox" /><br>
			{else}
				<label for="super_user_edit">Admin</label>
				<input type="checkbox" name="super_user_edit" id="super_user_edit" class="checkbox" checked/><br>
			{/if}
			
			<label for="post_edit">Post</label>
			<input type="text" name="post_edit" id="post_edit" class="text ui-widget-content ui-corner-all" value="{$edit_employees['post']}"/>
			
			<label for="login_edit">Login</label>
			<input type="text" name="login_edit" id="login_edit" class="text ui-widget-content ui-corner-all" value="{$edit_employees['login']}" disabled="true"/>
			
			<label for="new_password_edit">Password (optional)</label>
			<input type="text" name="new_password_edit" id="new_password_edit"  class="text ui-widget-content ui-corner-all" />
		</fieldset>
		</form>
	</div>
	
	<div id="dialog-delete-employee" title="Delete employee">
	<p class="validateTips"><em>Select employee,please!</em></p>
		<form>
			<center><h2><em>Employees</em></h2></center>
			<table align="center" border=3 id="tabl_employee" class="ui-widget ui-widget-content" rules="all" >
			<tr align="center" class="ui-widget-header ">
				<th width="150 px">Name</th>
				<th width="95 px" nowrap><span style="cursor: pointer;"><ins><a  id="select-all-employee">Select</a><ins></span></th>
				{foreach $employees as $item}
					<tr><td>{$item.name}</td>
					<td><center><input type="checkbox" name="demployees[]" id="demployees" value="{$item.id}"></center></td>
				{/foreach}
			</table>
		</form>
	</div>
	
	<div id="dialog-delete-machine" title="Delete machine">
	<p class="validateTips"><em>Select machine,please!</em></p>
		<form>
			<center><h2><em>Machines</em></h2></center>
			<table align="center" border=3 id="machines" class="ui-widget ui-widget-content" rules="all" >
			<tr align="center" class="ui-widget-header ">
				<th width="150 px">Name</th>
				<th width="95 px" nowrap><span style="cursor: pointer;"><ins><a  id="select-all-machine">Select</a><ins></span></th>
				{foreach $machines as $item}
					<tr><td>{$item.name}</td>
					<td><center><input type="checkbox" name="dmachines[]" id="dmachines" value="{$item.id}"></center></td>
				{/foreach}
			</table>
		</form>
	</div>
	
	<div id="dialog-help" title="HELP">
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
					<td>Shft+1</td>
					<td>Dialog 'Add employee'</td>
			</tr>
			<tr>
					<td>Shft+2</td>
					<td>Dialog 'Delete employee'</td>
			</tr>
			<tr>
					<td>Ctrl+3</td>
					<td>Dialog 'Add record'</td>
			</tr>	
			<tr>
					<td>Ctrl+4</td>
					<td>Dialog 'HELP'</td>
			</tr>	
			</table>
		</fieldset>
		</form>
	</div>
	
	<div class="demo">
	<b class='text ui-widget-content ui-corner-all' id='menu_product' >Menu:</b> <span style='cursor: pointer'><a  style="color:blue";  id="add_employee"  class='text ui-widget-content ui-corner-all'>[Add employee] </a><a  style="color:blue";  id="add_machine"  class='text ui-widget-content ui-corner-all'>[Add machine] </a></span><span style='cursor: pointer'><a   style="color:blue; " id="make_record_admin"    class='text ui-widget-content ui-corner-all'>[Add record] </a><span style='cursor: pointer'><a   style="color:blue; " id="delete_employee"    class='text ui-widget-content ui-corner-all'>[Delete employee] </a><a   style="color:blue; " id="delete_machine"    class='text ui-widget-content ui-corner-all'>[Delete machine] </a></span><span style='cursor: pointer'><a   style="color:blue; " id="help"    class='text ui-widget-content ui-corner-all'>[Help] </a></span><span style='cursor: pointer'><a  href='?a=logout' style="color:blue; " id="log_out"    class='text ui-widget-content ui-corner-all'>[Log out] </a></span><br>

	<div id="l_employee">
	<hr class="hr"><b class="text ui-widget-content ui-corner-all" id='menu_category'>Employees:</b> <span style='cursor: pointer'></span><span style='cursor: pointer'><a  href='?a=show' style='color:blue'   id="all_employees"  class='text ui-widget-content ui-corner-all'>[All]</a>
		{foreach $employees as $item}
			<span style='cursor: pointer'><a href='?a=show&id={$item.id}' id='employee_links' style='color:blue' class='text ui-widget-content ui-corner-all'>{$item.name}</a></span>
		{/foreach}
	</div>
	</span>

	
	<table width="100%">
	<div id="center"><h1><font style="font-family:Tahoma; font-size:15pt;font-size:14pt" >Hello, {$employee}.  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Selected employee: "{$show_employees.name}" </h1></div>
	<hr class="hr"><br>
	<tr>
	<td width="65%" valign="top">	
		<div id="center"><h2><font style="font-family:Tahoma; font-size:15pt;font-size:13pt" >Journal of shifts</h2>
			<table  id="tabl1" class="tablesorter" >
			<thead>			
				<th width="5%" >Date-Time</th>
				<th width="15%" >Employee Name</th>
				<th width="5%" >Machine</th>
				<th width="5%" >Post</th>
				<th width="15%" >Claims</th>
				<th width="5%" >Shift</th>
			</thead>
			<tbody>
					{foreach $journal as $item}
								<tr>	
									<td width="5%">{$item.datetime}</td>
									<td width="15%">{$item.name}</td>
									<td width="5%">{$item.name_machine}</td>
									<td width="5%">{$item.post}</td>
									<td width="15%">{$item.claims}</td>
									<td width="5%">{$item.shift}</td>
								</tr>
					{/foreach}
			</tbody>
			</table>
		</div>
	</td>
	<td width="15%" valign="top">
	</td>
	<td width="25%" valign="top">
			<center><h2><font style="font-family:Tahoma; font-size:15pt;font-size:13pt" >All employees</h2></center>
			<table  id="tabl2" class="tablesorter" >
			<thead>
				<th width="15%" >Name</th>
				<th width="5%" >Admin</th>
				<th width="5%" >Post</th>
				<th width="5%" >Edit</th>
				<th width="5%" >Delete</th>
			</thead>
			<tbody>
					{foreach $employees as $item}
									<td width="5%">{$item.name}</td>
									{if $item.superuser eq '0'}
										<td width="5%"> no </td>
									{else}
										<td width="5%"> yes </td>
									{/if}
									<td width="5%">{$item.post}</td>
									<td width="5%"><center><span style="cursor: pointer;"><a href= "?a=edit&id={$item.id}" style='color:blue' class="text ui-widget-content ui-corner-all" name="eitem[]" id="edit-item">Edit</a></span></center></td>
									<td width="5%"><center><span style="cursor: pointer;"><a href= "?a=del&id={$item.id}" style='color:blue' class="text ui-widget-content ui-corner-all" name="ditem[]" id="edit-item">Delete</a></span></center></td>
								</tr>
							{/if}
					{/foreach}
				</tr>
			</tr>
			</tbody>
			</table>
	</td>
	</tr>
	</table>
</form>
</body>
{literal}
<?php
   if( (isset($_GET['a'])) && ($_GET['a']=="edit") ) { 
?>	
	<script type="text/javascript">
		get_id="",get_a="";
		$(function() {			 
			var parts=document.location.search.substr(1).split("&");
			var GET={},  curr;
			for (i=0; i<parts.length; i++) {
				 curr = parts[i].split('=');
				 GET[curr[0]] = curr[1];
			}
			for (var el in GET) {
			 if (el=="id")
			   get_id=GET[el];
			 if (el=="a")
			   get_a=GET[el];
			}
			 if (get_a=="edit" && get_id>=0) {
				 $(function() {		
					$.ajax({
							type: "POST",
							url: "ajax.php",
							cashe: false,
							success: function(data)	{
								$("#name_edit").html(data);								
							}
					});
					$( "#dialog-edit-employee" ).dialog( "open" );	
					// эмуляция перехода на страничку "/page2.html" без перезагрузки странички 
					window.history.pushState("object or string", "Title", "/index.php"); 
					// замена текущего URL на "/page3.html" 
					window.history.replaceState("object or string", "Title", "/");
				});
			 
			 }
		});
		</script>

<?php
    } 
?>
{/literal}
</html>






