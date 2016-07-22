<html>
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
			
			<div id="content">{$mess}</div>
		</div>
	</div>
	
	</form>
</body>