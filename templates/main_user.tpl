<html>

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
				{foreach $machines as $item}
					<option value="{$item.id}">{$item.name}</option>
				{/foreach}
			</select>
			
			<label for="claim_text_user">Text of claim (optional)</label>
			<input type="text" name="claim_text_user" id="claim_text_user" class="text ui-widget-content ui-corner-all"/>
			
			<label for="shift_user">Shift</label>
			<select name="shift_user" id="shift_user" class="text ui-widget-content ui-corner-all" >
				<option value="1">took</option>
				<option value="2">passed</option>
			</select>
			
			<input type="hidden" name="employee_id" id="employee_id"  class="text ui-widget-content ui-corner-all" value="{$employeeid}"/>	
		</fieldset>
		</form>
	</div>
	
	
	
	<div class="demo">
	<b class='text ui-widget-content ui-corner-all' id='menu_product' >Menu:</b> <span style='cursor: pointer'><a  style="color:blue";  id="make_record_user"  class='text ui-widget-content ui-corner-all'>[Add record] </a><span style='cursor: pointer'><a  href='?a=logout' style="color:blue; " id="log_out"    class='text ui-widget-content ui-corner-all'>[Log out] </a></span><br>
	
	
	<center><h1><font style="font-family:Tahoma; font-size:15pt;font-size:26pt" >Hello,"{$employee}" </h1></center>
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
					{foreach $journal as $item}
								<tr>	
									<td width="5%">{$item.datetime}</td>
									<td width="5%">{$item.name}</td>
									<td width="5%">{$item.name_machine}</td>
									<td width="5%">{$item.claims}</td>
									<td width="5%">{$item.shift}</td>
								</tr>
							
					{/foreach}
				

			</tbody>
			</table>
</form>
</body>
</html>






