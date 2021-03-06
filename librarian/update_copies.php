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

		<title>Actualización de Copias</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css?v=<?PHP echo time(); ?>" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css?v=<?PHP echo time(); ?>" />
		<link rel="stylesheet" type="text/css" href="css/header_librarian_style.css?v=<?PHP echo time(); ?>" />
		
		<link rel="stylesheet" href="css/update_copies_style.css?v=<?PHP echo time(); ?>">
	</head>
	<body>
		<form class="cd-form" method="POST" action="#">
			<legend>Ingresa la información</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-isbn" type='text' name='b_isbn' id="b_isbn" placeholder="ISBN del libro" required />
				</div>
					
				<div class="icon">
					<input class="b-copies" type="number" name="b_copies" placeholder="Número de copias a agregar" required />
				</div>
						
				<input type="submit" name="b_add" value="Agregar copias" />
		</form>
		<body>
		<form class="cd-form" method="POST" action="searched.php">
			<legend>Busca un libro</legend>
			
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
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_with_field("ISBN inválido", "b_isbn");
			else
			{
				$query = $con->prepare("UPDATE book SET copies = ? WHERE isbn = ?;");
				$query->bind_param("ds", $_POST['b_copies'], $_POST['b_isbn']);
				if(!$query->execute())
					die(error_without_field("ERROR: No se pudieron agregar copias"));
				echo success("Copias actualizadas con éxito");
			}
		}
	?>
</html>