<?php
	require_once('header.html');
?>
<?php
	$server = "localhost"; 
	$user = "admin";
	$password = "sio";
	$dbname = "acf2l";
			
	// Create connection
	$conn = new mysqli($server, $user, $password, $dbname);
	// Check connection
			
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$nom = $_GET['nom'];
	$email = $_GET['email'];
	$date = $_GET['dateNaissance'];
	$demande = $_GET['demande'];

	$requete = "INSERT INTO message(nomPersonne,melPersonne,dateNaissance,objet) VALUES ('$nom','$email','$date','$demande');"; 
			
	if ( !( $result = mysqli_query( $conn,$requete )))
		die( "Erreur de la requete :". $conn -> error );

	mysqli_close($conn); 

	echo"<h2>Merci, Mr, Mme $nom pour votre prise de contact, nous vous repondrons prochainement </h2>";
?>
<?php
	require_once('footer.html');
?>