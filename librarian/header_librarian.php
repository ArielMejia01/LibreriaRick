<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
		<link rel="stylesheet" href="./css/header_style.css?v=<?PHP echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="css/header_librarian_style.css?v=<?PHP echo time(); ?>" />
	</head>
	<body>
		<header>
			<div id="cd-logo">
				<a href="../">
					<img src="img/ic_logo.svg" alt="Logo" />
					<p>Libreria Rick</p>
				</a>
			</div>
			
			<div class="dropdown">
				<button class="dropbtn">
					<p id="librarian-name">
						<?php	
							echo $_SESSION['username'] ; 
							echo '<script>console.log('. json_encode( $_SESSION) .')</script>'; 
						?>
					</p>
				</button>
				<div class="dropdown-content">
					<a href="../logout.php">Cerrar Sesión</a>
				</div>
			</div>
			
		</header>
	</body>
</html>