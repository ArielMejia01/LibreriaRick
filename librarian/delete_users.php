<?php
	require "../db_connect.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Eliminar Usuarios</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/custom_checkbox_style.css">
		<link rel="stylesheet" type="text/css" href="../member/css/my_books_style.css?v=<?PHP echo time(); ?>" />
	</head>

	<body>
		<?php
			$query = $con->prepare("SELECT * FROM librarian;");
			$query->execute();
			$result = $query->get_result();
			$rows = mysqli_num_rows($result);
			if($rows == 0)
				echo "<h2 align='center'>No hay usuarios</h2>";
			else
			{
				echo "<form class='cd-form' method='POST' action='#'>";
				echo "<legend>Lista de Usuarios</legend>";
				echo "<div class='success-message' id='success-message'>
						<p id='success'></p>
					</div>";
				echo "<div class='error-message' id='error-message'>
						<p id='error'></p>
					</div>";
				echo"<table width='105%' cellpadding='10' cellspacing='10'>
						<tr>
							<th>Código<hr></th>
							<th>Usuario<hr></th>
							<th>Contraseña<hr></th>
						</tr>";
				for($i=0; $i<$rows; $i++)
				{

					$innerRow = mysqli_fetch_array($result);
					echo "<tr>";
						for($j=0; $j<3; $j++){
							echo "<td style='text-align:center'>".$innerRow[$j]."</td>";
						}				
					echo "<td style='text-align:center'>
							<label class='control control--checkbox'>
							<input type='checkbox' name='cb_user".$i."' value='".$i."'>
							<div class='control__indicator'></div>
							</label>
							</td>";
					echo "</tr>";
								
				}
				
				echo "</table><br />";
				echo "<div id='allTheThings'>
				<input type='submit' name='b_return' value='Eliminar' />;
		        </div>";
				echo "</form>";
				
			}
			
			if(isset($_POST['b_return']))
			{
				for($i=0; $i<$rows; $i++)

					if(isset($_POST['cb_user'.$i]))
					{
						$query = $con->prepare("SELECT * FROM librarian LIMIT ?,1");
						$query->bind_param("s", $_POST['cb_user'.$i]);
						$query->execute();
						$res = $query->get_result();
						$row = mysqli_fetch_array($res);
						$s= $row["id"];	
						settype($s, 'int');
						$query = $con->prepare("DELETE FROM librarian WHERE id = '$s';");
						$query->execute();
						echo "<meta http-equiv='refresh' content='0'>";					
					}

					
			}
	
		?>
		
	</body>
</html>