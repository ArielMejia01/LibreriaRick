<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../header.php";
?>

<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="./css/index_style.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="../css/header_style.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="./css/register_style.css?v=<?PHP echo time(); ?>">
	</head>
	<body>
		<form class="cd-form" method="POST" action="#">
			<legend>Ingresa tu información</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="m-user" type="text" name="m_user" id="m_user" placeholder="Usuario" required />
				</div>
				
				<div class="icon">
					<input class="m-pass" type="password" name="m_pass" placeholder="Contraseña" required />
				</div>
				
				<div class="icon">
					<input class="m-name" type="text" name="m_name" placeholder="Nombre Completo" required />
				</div>
				
				<div class="icon">
					<input class="m-email" type="email" name="m_email" id="m_email" placeholder="Correo" required />
				</div>
				
				<div class="icon">
					<input class="m-balance" type="number" name="m_balance" id="m_balance" placeholder="Balance Inicial" required />
				</div>
				
				<br />
				<input type="submit" name="m_register" value="Registrarse" />
		</form>
	</body>
	
	<?php
		if(isset($_POST['m_register']))
		{
			if($_POST['m_balance'] < 500)
				echo error_with_field("Su crédito debe ser mayor a L.500.00", "m_balance");
			else
			{
				$query = $con->prepare("(SELECT username FROM member WHERE username = ?) UNION (SELECT username FROM pending_registrations WHERE username = ?);");
				$query->bind_param("ss", $_POST['m_user'], $_POST['m_user']);
				$query->execute();
				if(mysqli_num_rows($query->get_result()) != 0)
					echo error_with_field("El usuarios ya existe, por favor escriba otro", "m_user");
				else
				{
					$query = $con->prepare("(SELECT email FROM member WHERE email = ?) UNION (SELECT email FROM pending_registrations WHERE email = ?);");
					$query->bind_param("ss", $_POST['m_email'], $_POST['m_email']);
					$query->execute();
					if(mysqli_num_rows($query->get_result()) != 0)
						echo error_with_field("Ya existe una cuenta con este correo", "m_email");
					else
					{
						$query = $con->prepare("INSERT INTO pending_registrations(username, password, name, email, balance) VALUES(?, ?, ?, ?, ?);");
						$query->bind_param("ssssd", $_POST['m_user'], ($_POST['m_pass']), $_POST['m_name'], $_POST['m_email'], $_POST['m_balance']);
						if($query->execute())
							echo success("Su Solicitud de creación de usuario ha sido enviada, favor presentese a caja a cancelar");
						else
							echo error_without_field("No se ha podido crear el usuario, favor contacte al Administrador");
					}
				}
			}
		}
	?>
	
</html>