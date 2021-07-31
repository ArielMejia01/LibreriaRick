<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
		<link rel="stylesheet" href="../member/css/register_style.css">
	</head>
	<body>
		<form class="cd-form" method="POST" action="#">
			<legend>Ingresa el nuevo usuario Administrador</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="m-user" type="text" name="m_user" id="m_user" placeholder="Usuario" required />
				</div>
				
				<div class="icon">
					<input class="m-pass" type="password" name="m_pass" placeholder="Contraseña" required />
				</div>
							
				<br />
				<input type="submit" name="m_register" value="Registrar" />
		</form>
	</body>
	
	<?php
		if(isset($_POST['m_register']))
		{
			
				$query = $con->prepare("SELECT * FROM librarian WHERE username = ?");
				$query->bind_param("s", $_POST['m_user']);
				$query->execute();
				if(mysqli_num_rows($query->get_result()) != 0)
					echo error_with_field("El Usuario ya existe", "m_user");
				else
				{
						$query = $con->prepare("INSERT INTO librarian(username, password) VALUES(?, ?);");
						$query->bind_param("ss", $_POST['m_user'], ($_POST['m_pass']));
						if($query->execute())
							echo success("Usuario Registrado Exitosamente");
						else
							echo error_without_field("Error al registrar");
					
				}
			
		}
	?>
	
</html>