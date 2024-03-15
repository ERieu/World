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

    $idsalaries = $_GET['idsalaries'];
    $nom = $_GET['nom'];
    $email = $_GET['email'];
    $date_naissance = $_GET['date_naissance'];
    $date_embauche = $_GET['date_embauceh'];
    $salaire = $_GET['salaire'];
    $service = $_GET['service'];

    $requete = "UPDATE salaries set nom='$nom',date_naissance='$date_naissance', date_embauche='$date_embauche' where idsalarie = $idsalarie";

    if ( !( $result = mysqli_query( $conn,$requete )))
        die( "Erreur de la requete :". $conn -> error );

    mysqli_close($conn);

    header('Location: listeSalaries.php');
?>