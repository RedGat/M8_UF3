<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body style="background-color: #99ff66">
	


	<h1>Login</h1>

	<form method="post" action="#">

	Usuari:<input type='text' name='user'>
	Contrasenya: <input type='password' name='pswd'>
	<input type='submit' name='submit' value='Introduir'>
	

	</form>

	<?php

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$usr = $_POST['user'];
			$password = $_POST['pswd'];
			$conn = mysqli_connect('localhost','pop','pop');
			mysqli_select_db($conn, 'login');

			$consulta = "SELECT id, user FROM users WHERE user = '" . $usr . "' and password = SHA2('" .$password. "',512);";

			echo $consulta;

			$resultat = mysqli_query($conn, $consulta);
			if ($resultat==false) {
	                $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
	                $message .= 'Consulta realitzada: ' . $consulta;
	                die($message);
	        }

			$num = mysqli_num_rows($resultat);

			echo $num."<br>\n";
/*
			if (!$resultat) {
	                $message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
	                $message .= 'Consulta realitzada: ' . $consulta;
	                die($message);
	        }


	        while($row = mysqli_fetch_assoc($resultat) ) {
	        	
	        	echo "<br>Hola, " . $row['user'] . ". El teu id és: " . $row['id'];
	        	

	        }
	
 */           

	        if($num == 1) {
	        	echo "Entres";
	        }
	        else {
	        	echo "No entres";
	        }


	    }
	  ?>




	
</body>
</html>