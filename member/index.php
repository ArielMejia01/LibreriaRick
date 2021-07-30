<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../verify_logged_out.php";
	require "../header.php";
?>

<html>
	<head>
		<title>Ingreso de Miembro</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="../css/global_styles.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="../css/header_style.css?v=<?PHP echo time();?>">

		<link rel="stylesheet" type="text/css" href="../css/form_styles.css?v=<?PHP echo time();?>">
		<link rel="stylesheet" type="text/css" href="./css/index_style.css?v=<?PHP echo time();?>">
	</head>
	<section>
		<form class="cd-form" method="POST" action="#">
			<legend>Ingreso de Miembro</legend>
			
			<div class="error-message" id="error-message">
				<p id="error"></p>
			</div>
			
			<div class="icon">
				<input class="m-user" type="text" name="m_user" placeholder="Usuario" required />
			</div>
			
			<div class="icon">
				<input class="m-pass" type="password" name="m_pass" placeholder="Contraseña" required />
			</div>
			
			<input type="submit" value="Ingresar" name="m_login" />
		</form>

		<p align="center" >¿No tienes cuenta aún?&nbsp;<a href="register.php">Regístrate</a>
	</section>
	
	<?php
		if(isset($_POST['m_login']))
		{
			$query = $con->prepare("SELECT id, balance FROM member WHERE username = ? AND password = ?;");
			$query->bind_param("ss", $_POST['m_user'], $_POST['m_pass']);
			$query->execute();
			$result = $query->get_result();
			
			if(mysqli_num_rows($result) != 1)
				echo error_without_field("Invalid username/password combination");
			else 
			{
				$resultRow = mysqli_fetch_array($result);
				$balance = $resultRow[1];
				if($balance < 0)
					echo error_without_field("Your account has been suspended. Please contact a librarian for further information");
				else
				{
					$_SESSION['type'] = "member";
					$_SESSION['id'] = $resultRow[0];
					$_SESSION['username'] = $_POST['m_user'];
					header('Location: home.php');
				}
			}
		}
	?>
	
</html>