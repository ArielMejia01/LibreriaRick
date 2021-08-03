<?php
	require "../db_connect.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Consola de Administración</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css?v=<?PHP echo time();?>">

		<link rel="stylesheet" type="text/css" href="css/home_style.css" />
		<link rel="stylesheet" href="css/header_librarian_style.css?v=<?PHP echo time(); ?>">
		<link rel="stylesheet" href="./css/users.css?v=<?PHP echo time(); ?>">
	</head>
	<body>
		<div id="allTheThings">
			<a href="register.php">
				<input type="button" value="Registrar" />
			</a>
			
			<a href="delete_users.php">
				<input type="button" value="Ver/Eliminar" />
			</a>
		</div>
	</body>
</html>