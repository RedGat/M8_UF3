<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Ciutats País</h1>

		<?php

	$conn = mysqli_connect('localhost','pop','pop');
	// conectamos con la bdd

	mysqli_select_db($conn, 'world');
	// ens connectem a world
	$pais = $_POST['paisos'];


	$consulta = 'SELECT city.Name cname, country.Name coname FROM city, country WHERE country.Code = city.CountryCode AND country.Name = "' .$pais. '";';
	// carreguem la consulta a una variable

//, co.Name ----->Aixo va al select, al costat de ci.Name

	$resultat = mysqli_query($conn, $consulta);
	// enviem la consulta -->

	if (!$resultat) {
	                 $message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
	                 $message .= 'Consulta realitzada: ' . $consulta;
	                 die($message);
	         }


	echo '<form>';
	echo '<table border="1" bordercolor="black"><tr><td>Ciutat</td><td>País</td></tr>';
	while( $registre = mysqli_fetch_assoc($resultat) ) {
	        
	          echo "<tr><td>".$registre["cname"]."</td><td>".$registre["coname"]."</td></tr>";

	        }

	echo '</table>';

	         ?>

</body>
</html>

