<?php
	require_once('libs/smarty/Smarty.class.php');
	require_once('./config.php');
	session_start();
	
	$smarty = new Smarty ();
	
	$smarty->template_dir='templates/';
	$smarty->compile_dir='templates/templates_c/';
	
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
	
	//check password
	$all = array();
	/*if (isset($_POST['login_check']) && isset($_POST['password_check'])) {
		$login = $_POST['login_check'];
		$password = $_POST['password_check'];
		$sql2 = $db->query("SELECT `employees`.`id`,`employees`.`name`,`employees`.`login`,`employees`.`password`,`employees`.`superuser` FROM `employees` WHERE `employees`.`login`='$login'");
		$key="fghsghsdjgsjgsjgsdfg747365rrferbrvvbfgytuysj";
		if ($row = $sql2->fetch_assoc()) {
			if (strcmp(md5(md5($key.$password)),$row['password'])==0) {
				if($row['superuser']==1)
					$_SESSION['auth'] = 1;
				else
					$_SESSION['auth'] = 2;
				$_SESSION['employee_pass'] = $row['password'];
				$_SESSION['employee'] = $row['name'];
				$_SESSION['employeeid'] = $row['id'];
				$all['id']=0;
				$all['name']="All";
				$_SESSION['show_employees'] = $all;
				
			}
			else {
				$vars['mess']="Incorrect password!";
			}
		}
		else {
				$vars['mess']="Incorrect login and/or password!";
			}
		
	}*/
	
		$_SESSION['auth'] = 1;
				
	//log_out
	if($_GET['a']=='logout') {
		unset($_SESSION['auth']);
		unset($_SESSION['show_flag']);
	}
	//display forms
	if($_SESSION['auth'] == 1) {
		
		//delete
		if( (isset($_GET['a'])) && ($_GET['a']=="del") ) { 
			$sql=$db->query("DELETE FROM `employees` WHERE id=$_GET[id]");
			$sql=$db->query("DELETE FROM `journal` WHERE name=$_GET[id]");
		} 
		//get ip
		$vars['real_ip'] = getRealIp();
	
		//journal
		$journal = array();
		
		if (isset($_GET['a']) && $_GET['a']=="show" && isset($_GET['id']) )  {  
			$_SESSION['id_employee'] = $_GET['id'];
			$_SESSION['show_flag'] = 1;
			$sql1 = $db->query("SELECT `journal`.`id`,`journal`.`datetime`,`employees`.`name` AS `name`,`machines`.`name` AS `name_machine`,`employees`.`post` AS `post`,`journal`.`claims`,`journal`.`shift` FROM `journal`  LEFT JOIN `employees` ON `employees`.`id`=`journal`.`name` LEFT JOIN `machines` ON `machines`.`id`=`journal`.`machine` WHERE `journal`.`name`=$_GET[id]" );		
			while ($row = $sql1->fetch_assoc()) {
				$parts = explode(' ',$row['datetime']);
				$date_parts = explode('-',$parts['0']);		
				$date = "$date_parts[2]"."."."$date_parts[1]"."."."$date_parts[0]";
				$row['datetime'] = "$date"." "."$parts[1]";
				$row['claims'] = stripcslashes($row['claims']);
				$journal[] = $row;
			}
			$vars['journal'] = $journal;
		}
		else {
			if ( $_SESSION['show_flag']==1 &&  $_GET['a']!="show" ) {				
					
				$sql1 = $db->query("SELECT `journal`.`id`,`journal`.`datetime`,`employees`.`name` AS `name`,`machines`.`name` AS `name_machine`,`employees`.`post` AS `post`,`journal`.`claims`,`journal`.`shift` FROM `journal`  LEFT JOIN `employees` ON `employees`.`id`=`journal`.`name` LEFT JOIN `machines` ON `machines`.`id`=`journal`.`machine` WHERE `journal`.`name`=$_SESSION[id_employee]" );		
			}
			else {	
				$sql1 = $db->query("SELECT `journal`.`id`,`journal`.`datetime`,`employees`.`name` AS `name`,`machines`.`name` AS `name_machine`,`employees`.`post` AS `post`,`journal`.`claims`,`journal`.`shift`  FROM `journal`  LEFT JOIN `employees` ON `employees`.`id`=`journal`.`name` LEFT JOIN `machines` ON `machines`.`id`=`journal`.`machine`" );		
				$_SESSION['show_flag']=0;			
				$all['id']=0;
				$all['name']="All";
				$_SESSION['show_employees'] = $all;
			}
			while ($row = $sql1->fetch_assoc()) {
				$parts = explode(' ',$row['datetime']);
				$date_parts = explode('-',$parts['0']);		
				$date = "$date_parts[2]"."."."$date_parts[1]"."."."$date_parts[0]";
				$row['datetime'] = "$date"." "."$parts[1]";
				$row['claims'] = stripcslashes($row['claims']);
				$journal[] = $row;
			}
			$sql1->close();
			$vars['journal'] = $journal;
		}				
		//employees
		$employees = array();
		$sql2 = $db->query("SELECT `id`,`name`,`post`,`login`,`password`,`superuser` FROM `employees` ORDER BY `name`" );		
		while ($row = $sql2->fetch_assoc()) {
			$employees[] = $row;
		}
		
		$sql2->close();
		
		$vars['employees'] = $employees;
		
		
		//machines
		$machines = array();
		$sql2 = $db->query("SELECT `id`,`name` FROM `machines` ORDER BY `name`" );		
		while ($row = $sql2->fetch_assoc()) {
			$machines[] = $row;
		}
		
		$sql2->close();
		
		$vars['machines'] = $machines;
		
		//edit_employees
		$edit_employees = array();
		if( isset($_GET['a']) && $_GET['a']=="edit" && isset($_GET['id'])) { 
			$sql2 = $db->query("SELECT `employees`.`id`,`employees`.`name`,`employees`.`post`,`employees`.`login`,`employees`.`password`,`employees`.`superuser` FROM `employees` WHERE `employees`.`id`=$_GET[id]");
			if ($row = $sql2->fetch_assoc()) {
				$edit_employees = $row;
			}
			
			$vars['edit_employees'] = $edit_employees;
		}
		
		//show_services
		if( isset($_GET['a']) && $_GET['a']=="show" && isset($_GET['id'])) { 
			$sql2 = $db->query("SELECT `name`,`id` FROM `employees` WHERE `id`=$_GET[id]");
			if ($row = $sql2->fetch_assoc()) {
				$show_employees =$row;
			}
			$sql2->close();
			$_SESSION['show_employees'] = $show_employees;
		}	
		
		$vars['show_employees'] = $_SESSION['show_employees'];
				
		
		$vars['employee'] = $_SESSION['employee'];
		$vars['employeeid'] = $_SESSION['employeeid'];
		//dialogs on javascript
		$template = 'main_admin';		
		//close DB
		$db->close(); 
	}
	else 
		if($_SESSION['auth'] == 2) {
		//dialogs on javascript
		//get ip
		$vars['real_ip'] = getRealIp();
		
		//machines
		$machines = array();
		$sql2 = $db->query("SELECT `id`,`name` FROM `machines` ORDER BY `name`" );		
		while ($row = $sql2->fetch_assoc()) {
			$machines[] = $row;
		}
		
		$sql2->close();
		
		$vars['machines'] = $machines;
		
		
		//journal
		
		$journal = array();
		$sql1 = $db->query("SELECT `journal`.`id`,`journal`.`datetime`,`employees`.`name` AS `name`,`machines`.`name` AS `name_machine`,`journal`.`claims`,`journal`.`shift` FROM `journal`  LEFT JOIN `employees` ON `employees`.`id`=`journal`.`name` LEFT JOIN `machines` ON `machines`.`id`=`journal`.`machine` WHERE `employees`.`login`='$_SESSION[employee]'");		
		while ($row = $sql1->fetch_assoc()) {
				$parts = explode(' ',$row['datetime']);
				$date_parts = explode('-',$parts['0']);		
				$date = "$date_parts[2]"."."."$date_parts[1]"."."."$date_parts[0]";
				$row['datetime'] = "$date"." "."$parts[1]";
				$row['claims'] = stripcslashes($row['claims']);
				$journal[] = $row;
		}
		$sql1->close();
		$vars['journal'] = $journal;
		$vars['employee'] = $_SESSION['employee'];
		$vars['employeeid'] = $_SESSION['employeeid'];
		$template = 'main_user';		
		}
		else
		{		
			$template = 'check_users';		
		}
	//to watch
	
	
	$smarty->assign($vars);
	$smarty->display($template . '.tpl');
?>