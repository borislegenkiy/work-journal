<?php	
	require_once('./config.php');
	//get ip
	function GetRealIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
		{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
		
	if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest') {
		if(isset($_POST['a'])) {
			$action=$_POST['a'];
			
			if ($action=="add_user" && isset($_POST['name']) && isset($_POST['login']) && isset($_POST['post']) && isset($_POST['password']) && isset($_POST['super_user']) ) {
				$name=addslashes($_POST['name']);
				$post=addslashes($_POST['post']);
				$login=addslashes($_POST['login']);
				$password=addslashes($_POST['password']);
				$super_user=addslashes($_POST['super_user']);
				$key="fghsghsdjgsjgsjgsdfg747365rrferbrvvbfgytuysj";
				$password=md5(md5($key.$password));
					$sql1=$db->query("INSERT INTO `employees` (name,post,login,password,superuser) VALUES ('$name','$post','$login','$password','$super_user')"); 
					$sql2 = $db->query("SELECT `id`,`name`,`post`,`login`,`password`,`superuser` FROM `employees` ORDER BY `id`" );		
					$tabl1_employees="<table id='tabl2' class='tablesorter'>
								<thead>
									<th width='15%' >Name</th>
									<th width='5%' >Admin</th>
									<th width='5%' >Post</th>
									<th width='5%' >Edit</th>
									<th width='5%' >Delete</th>
								</thead>
							<tbody>";
					$tabl2_employees="<table align='center' border=3 id='tabl_employee' class='ui-widget ui-widget-content' rules='all' >
							<tr align='center' class='ui-widget-header'>
								<th width='150 px'>Name</th>
								<th width='95 px' nowrap><span style='cursor: pointer;'><ins><a  id='select-all-employee'>Select</a><ins></span></th>
							</tr>";
					$links="<hr class='hr'><b class='text ui-widget-content ui-corner-all' id='menu_category'>Employees:</b> <span style='cursor: pointer'></span><span style='cursor: pointer'><a  href='?a=show' style='color:blue'   id='all_employees'  class='text ui-widget-content ui-corner-all'>[All]</a>";
							
						while ($row = $sql2->fetch_assoc()) {
							if($row['superuser']==0)
								$superuser="no";
							if($row['superuser']==1)
								$superuser="yes";			
							$tabl1_employees.="										
									<tr>
										<td width='5%'>$row[name]</td>
										<td width='5%'>$superuser</td>
										<td width='5%'>$row[post]</td>
										<td width='5%'><center><span style='cursor: pointer;'><a href= '?a=edit&id=$row[id]' style='color:blue' class='text ui-widget-content ui-corner-all' name='eitem[]' id='edit-item'>Edit</a></span></center></td>
										<td width='5%'><center><span style='cursor: pointer;'><a href= '?a=del&id=$row[id]' style='color:blue' class='text ui-widget-content ui-corner-all' name='ditem[]' id='edit-item'>Delete</a></span></center></td>
									</tr>
								";
							$tabl2_employees.="										
									<tr>
										<td>$row[name]</td>
										<td><center><input type='checkbox' name='demployees[]' id='demployees' value='$row[id]'></center></td>
									</tr>
								";
							$links.="<span style='cursor: pointer'><a href='?a=show&id=$row[id]' id='employee_links' style='color:blue' class='text ui-widget-content ui-corner-all'>$row[name]&nbsp</a></span>";
						}
						
						$tabl1_employees.="</tbody></table>";
						$tabl2_employees.="</table>";

						$result[]=array ("tabl1"=>$tabl1_employees,
								"tabl2"=>$tabl2_employees,
								"link"=>$links);
						echo json_encode($result);
						
					}
					
			if ($action=="add_machine" && isset($_POST['name_machine']) ) {
				$name_machine = $_POST['name_machine'];
				$sql1=$db->query("INSERT INTO `machines` (name) VALUES ('$name_machine')");
				$sql2 = $db->query("SELECT `id`,`name` FROM `machines` ORDER BY `id` DESC LIMIT 1" );		
				if ($row = $sql2->fetch_assoc()) {
					$result[]=array ("tabl"=>"
									<tr>
										<td>$row[name]</td>
										<td><center><input type='checkbox' name='dmachines[]' id='dmachines' value='$row[id]'></center></td>
									</tr>",
								"select"=>
								"
									<option value='$row[id]'>$row[name]</option>
								");
					echo json_encode($result);
				}
			}
			
			
			if ($action=="add_record_admin" && isset($_POST['shift_admin'])  && isset($_POST['employee_id']) && isset($_POST['machines_admin'])) {
				if($_POST['claim_text_admin']!="") {
					$claim_text_admin=addslashes($_POST['claim_text_admin']);
				} else {
					$claims_admin="";
				}
				if(intval($_POST['employee_id']) && intval($_POST['machines_admin']) && (intval($_POST['shift_admin']))) {
						if(strpos(IP, getRealIp()))
								$sql1=$db->query("INSERT INTO `journal` (datetime,name,machine,claims,shift) VALUES (NOW(),'$_POST[employee_id]','$_POST[machines_admin]','$claim_text_admin','$_POST[shift_admin]')"); 
								$sql2 = $db->query("SELECT `journal`.`id`,`journal`.`datetime`,`employees`.`name` AS `name`,`employees`.`post` AS `post`,`machines`.`name` AS `name_machine`,`journal`.`claims`,`journal`.`shift` FROM `journal`  LEFT JOIN `employees` ON `employees`.`id`=`journal`.`name` LEFT JOIN `machines` ON `machines`.`id`=`journal`.`machine` ORDER BY `journal`.`id` ");		
								$result="<table id='tabl1' class='tablesorter'>
										<thead>			
											<th width='5%' >Date-Time</th>
											<th width='15%' >Employee Name</th>
											<th width='5%' >Machine</th>
											<th width='5%' >Post</th>
											<th width='15%' >Claims</th>
											<th width='5%' >Shift</th>
										</thead>
										<tbody>";
								while ($row = $sql2->fetch_assoc()) {
									$result.="										
											<tr>
												<td width='5%'>$row[datetime]</td>
												<td width='15%'>$row[name]</td>
												<td width='5%'>$row[name_machine]</td>
												<td width='5%'>$row[post]</td>
												<td width='15%'>$row[claims]</td>
												<td width='5%'>$row[shift]</td>
											</tr>
										";
								}
								$result.="</tbody>";
								echo $result;
							}
			}
			
			if ($action=="add_record_user"  && isset($_POST['shift_user'])  && isset($_POST['employee_id']) && isset($_POST['machines_user'])) {
				if($_POST['claim_text_user']!="") {
					$claim_text_user=addslashes($_POST['claim_text_user']);
				} else {
					$claims_user="";
				}
				if(intval($_POST['employee_id']) && intval($_POST['machines_user']) && (intval($_POST['shift_user']))) {
						if(strpos(IP, getRealIp())) {
								$sql1=$db->query("INSERT INTO `journal` (datetime,name,machine,claims,shift) VALUES (NOW(),'$_POST[employee_id]','$_POST[machines_user]','$claim_text_user','$_POST[shift_user]')"); 
								$sql2 = $db->query("SELECT `journal`.`id`,`journal`.`datetime`,`employees`.`name` AS `name`,`employees`.`post` AS `post`,`machines`.`name` AS `name_machine`,`journal`.`claims`,`journal`.`shift` FROM `journal`  LEFT JOIN `employees` ON `employees`.`id`=`journal`.`name` LEFT JOIN `machines` ON `machines`.`id`=`journal`.`machine` WHERE `journal`.`name`='$_POST[employee_id]' ORDER BY `journal`.`id`");		
								$result="<table id='tabl3' class='tablesorter'>
										<thead>			
											<th width='5%'>Date-Time</th>
											<th width='15%'>Employee Name</th>
											<th width='5%'>Machine</th>
											<th width='15%'>Claims</th>
											<th width='5%'>Shift</th>
										</thead>
										<tbody>";
									while ($row = $sql2->fetch_assoc()) {
									$result.="										
											<tr>
												<td width='5%'>$row[datetime]</td>
												<td width='15%'>$row[name]</td>
												<td width='5%'>$row[name_machine]</td>
												<td width='15%'>$row[claims]</td>
												<td width='5%'>$row[shift]</td>
											</tr>
										";
									}
									$result.="</tbody>";
									
									echo $result;
									
								}
								}
				}
			
			
			if ($action=="edit_employee" && isset($_POST['name']) && isset($_POST['login']) && isset($_POST['post']) && isset($_POST['super_user_edit'])) {
				$name=addslashes($_POST['name']);
				$post=addslashes($_POST['post']);
				$login=addslashes($_POST['login']);
				
				$super_user_edit=addslashes($_POST['super_user_edit']);
				if($_POST['new_password']!="") {
					$new_password_edit=addslashes($_POST['new_password']);
					$key="fghsghsdjgsjgsjgsdfg747365rrferbrvvbfgytuysj";
					$new_password_edit=md5(md5($key.$new_password_edit));
					$sql1=$db->query("UPDATE `employees` SET name= '$name',post='$post',password='$new_password_edit',superuser='$super_user_edit' WHERE `login`='$login'"); 
				}
				else
					$sql1=$db->query("UPDATE `employees` SET name= '$name',post='$post',superuser='$super_user_edit' WHERE `login`='$login'"); 
				
			}
			
			
			
			
			if ($action=="del_employee" && isset($_POST['idemployee'])) {
				$id_employees = explode(",", $_POST['idemployee']);
				foreach ($id_employees as $id) { 
					if(intval($id)) {
						$sql1=$db->query("DELETE FROM `employees` WHERE `id`='$id'");
						$sql1=$db->query("DELETE FROM `journal` WHERE `name`='$id'");
					}
				}
			}
			
			if ($action=="del_machine" && isset($_POST['idmachine'])) {
				$id_machines = explode(",", $_POST['idmachine']);
				foreach ($id_machines as $id) { 
					if(intval($id)) {
						$sql1=$db->query("DELETE FROM `machines` WHERE `id`='$id'");
						$sql1=$db->query("DELETE FROM `journal` WHERE `machine`='$id'");
					}
				}
			}
		
		}
		//$sql1->close();
	}		
	$db->close(); 	
?>