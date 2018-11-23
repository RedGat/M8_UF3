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
			
			
			$conn = mysqli_connect('localhost','pop','pop');
			mysqli_select_db($conn, 'login');
			$usr = mysqli_real_escape_string($conn, $_POST['user']);
			$password =  mysqli_real_escape_string($conn, $_POST['pswd']);

			$consulta = "SELECT id, user FROM users WHERE user = '" . $usr . "' and password = SHA2('" .$password. "',512);";

			echo $consulta;

			$resultat = mysqli_query($conn, $consulta);
			if ($resultat==false) {
	                $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
	                $message .= 'Consulta realitzada: ' . $consulta;
	                die($message);
	        }

			$num = mysqli_num_rows($resultat);

			
       

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