<?php
    require "../db_connect.php";
	require "../message_display.php";
	require "verify_member.php";
	require "header_member.php";
?>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Bienvenido</title>
		
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css?v=<?PHP echo time();?>">
		
		<link rel="stylesheet" type="text/css" href="../css/custom_radio_button_style.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" href="./css/home_style.css?v=<?PHP echo time(); ?>">

	</head>
	
	<body>
		<form class="cd-form" method="POST" action="searched.php">
			<legend>Busca tu libro</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="m-user" type="text" name="m_libro" id="m_libro" placeholder="Ingresa un nombre"/>
				</div>
							
				<br />
				<input type="submit" name="m_buscar" value="Buscar/Ver Todos" />
		</form>
		
	</body>
	
	

</html>