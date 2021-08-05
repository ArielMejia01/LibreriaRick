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
		<title>Búsqueda de Libro</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="css/home_style.css?v=<?PHP echo time();?>"/>
		<link rel="stylesheet" href="css/header_librarian_style.css?v=<?PHP echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
		<link rel="stylesheet" href="./css/boton_back.css?v=<?PHP echo time(); ?>">
	</head>
	<body>
	
		<?php
			$liked = "";
						if (isset($_POST['m_libro'])) {
							$liked = $_POST['m_libro'];
						}
			$query = $con->prepare("SELECT * FROM book WHERE title LIKE '%$liked%';");
			$query->execute();
			$result = $query->get_result();
			if(!$result)
				die("ERROR: No se pudieron extraer los libros de la base de datos");
			$rows = mysqli_num_rows($result);
			if($rows == 0)
				echo "<h2 align='center'>No existe el Libro</h2>";
			else
			{
				echo "<form class='cd-form' method='POST' action='#'>";
				echo "<a class='regresar' href='update_copies.php' style='float:right'>Regresar</a>";
				echo "<legend>Libros disponibles</legend>";
				echo "<div class='error-message' id='error-message'>
						<p id='error'></p>
					</div>";
				echo "<table width='100%' cellpadding=10 cellspacing=10>";
				echo "<tr>
						<th></th>
						<th>ISBN<hr></th>
						<th>Título<hr></th>
						<th>Autor<hr></th>
						<th>Categoría<hr></th>
						<th>Precio<hr></th>
						<th>Copias Disponibles<hr></th>
					</tr>";
				for($i=0; $i<$rows; $i++)
				{
					$row = mysqli_fetch_array($result);
					echo "<tr>
							<td>
							
							</td>";
					for($j=0; $j<6; $j++)
						if($j == 4)
							echo "<td>L".$row[$j]."</td>";
						else
							echo "<td>".$row[$j]."</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<br /><br/>";
				echo "<a class='subir' href='#' style='float:right'>Subir</a>";
				echo "</form> ";
			}
		
		?>
		
	</body>
</html>