<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../verify_logged_out.php";
	require "../header.php";
?>

<html>
	<head>
		<title>Ingreso Administrador</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="../css/global_styles.css?v=<?PHP echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="../css/header_style.css?v=<?PHP echo time();?>">

		<link rel="stylesheet" type="text/css" href="./css/index_style.css?v=<?PHP echo time(); ?>" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css?v=<?PHP echo time(); ?>">
	</head>
	<section>
		<form class="cd-form" method="POST" action="#">
		
		<legend>Ingreso Administrador</legend>
		
			<div class="error-message" id="error-message">
				<p id="error"></p>
			</div>
			
			<div class="icon">
				<input class="l-user" type="text" name="l_user" placeholder="Usuario" required />
			</div>
			
			<div class="icon">
				<input class="l-pass" type="password" name="l_pass" placeholder="Contraseña" required />
			</div>
			
			<input type="submit" value="Ingresar" name="l_login"/>
			
		</form>
	</sect>
	
	<?php
		if(isset($_POST['l_login']))
		{
			$query = $con->prepare("SELECT id FROM librarian WHERE username = ? AND password = ?;");
			$query->bind_param("ss", $_POST['l_user'], $_POST['l_pass']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_without_field("Nombre de usuario o password incorrecto.");
			else
			{
				$_SESSION['type'] = "librarian";
				$_SESSION['id'] = mysqli_fetch_array($result)[0];
				$_SESSION['username'] = $_POST['l_user'];
				header('Location: home.php');
			}
		}
	?>
	
</html>