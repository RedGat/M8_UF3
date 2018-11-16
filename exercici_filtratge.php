<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<?php

	

	$conn = mysqli_connect('localhost','pop','pop');
	// conectamos con la bdd

	mysqli_select_db($conn, 'world');
	// ens connectem a world

	$consulta = "SELECT * FROM country;";
	// carreguem la consulta a una variable


	$resultat = mysqli_query($conn, $consulta);
	// enviem la consulta -->

	if (!$resultat) {
	                 $message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
	                 $message .= 'Consulta realitzada: ' . $consulta;
	                 die($message);
	         }

	//si no hi ha resultat (0 files o bé hi ha algun error a la sintaxi)
	//posem un missatge d'error i acabem (die) l'execució de la pàgina web


	echo '<form action="cities.php" method="post">';
	echo "<select name='paisos'>";
	while( $registre = mysqli_fetch_assoc($resultat) ) {
	        
	          echo "<option value=".$registre["Name"].">".$registre["Name"]."</option>";

	        }

	echo "</select>";
	echo '<input type="submit">';
	echo "</form>";

	?>

</body>
</html>
