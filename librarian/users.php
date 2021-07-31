<?php
	require "../db_connect.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<title>Consola de Administración</title>
		<link rel="stylesheet" type="text/css" href="css/home_style.css" />
	</head>
	<body>
		<div id="allTheThings">
			<a href="register.php">
				<input type="button" value="Registrar" />
			</a><br />
			<a href="delete_users.php">
				<input type="button" value="Ver/Eliminar" />
			</a><br /><br />
		</div>
	</body>
</html>