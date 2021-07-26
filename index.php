<?php
	require "db_connect.php";
	require "header-index.php";
	session_start();
	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
	else if(strcmp($_SESSION['type'], "member") == 0)
		header("Location: member/home.php");
?>

<html>
	<head>
		<title>Biblioteca PrograWeb</title>
		<link rel="stylesheet" type="text/css" href="./css/index_style.css?v=<?PHP echo time(); ?>" />
	</head>
	<body>
		<div id="allTheThings">

			<div id="member">
				<a href="member">
					<img src="img/ic_member.svg" />
					<p>Miembro</p>
				</a>
			</div>
			
				<div id="librarian">
					<div id="verticalLine"></div>
					<a id="librarian-link" href="librarian">
						<img src="img/ic_librarian.svg" />
						<p>Administracion</p>
					</a>
				</div>
			
		</div>
	</body>
</html>