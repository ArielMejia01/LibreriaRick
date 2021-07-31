<?php
    require "../db_connect.php";
	require "../message_display.php";
	require "verify_member.php";
	require "header_member.php";
?>
<html>
	<head>
		<title>Bienvenido</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="css/home_style.css">
		<link rel="stylesheet" type="text/css" href="../css/custom_radio_button_style.css">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">

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