<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
		<link rel="stylesheet" type="text/css" href="css/header_member_style.css?v=<?PHP echo time();?>" />
	</head>
	<body>
		<header>
			<div id="cd-logo">
				<a href="../">
					<img src="img/ic_logo.svg" alt="Logo" />
					<p>Librería Rick </p>
					
				</a>
			</div>
			
			<div class="desplegar">
				<button class="desplegarbtn">
					<p id="libreria-nombre"><?php echo $_SESSION['username'] ?></p>
				</button>
				<div class="desplegar-contenido">
					<a>
						<?php
							$query = $con->prepare("SELECT balance FROM member WHERE username = ?;");
							$query->bind_param("s", $_SESSION['username']);
							$query->execute();
							$balance = (int)$query->get_result()->fetch_array()[0];
							echo "Mi crédito: L.".$balance;
						?>
					</a>
					<a href="my_books.php">Mis Libros</a>
					<a href="../logout.php">Cerrar Sesión</a>
				</div>
			</div>
		</header>
	</body>
</html>