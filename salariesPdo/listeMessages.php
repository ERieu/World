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

    $requete = "SELECT * FROM message";
    
    if ( !( $result = mysqli_query( $conn,$requete )))
        die( 'Erreur de la requete : '.$requete ); 
?>

<table class="table table-hover"> 
<thead>
<th>id</th>
<th>nom</th>
<th>mail</th>
<th>date de naissance</th>
<th>objet</th>
<th>update</th>
<th>delte</th>
</thead>
<?php
    //On teste si la requete retourne des résultats
    if (mysqli_num_rows($result) > 0) {
        // On exploite chaque ligne de résultat
        while( $row = mysqli_fetch_assoc($result) ) { 
            //print_r($row);
            echo "<tr>";
                echo "<td>".$row['idMessage']."</td>";
                echo "<td>".$row['nomPersonne']."</td>";
                echo "<td>".$row['melPersonne']."</td>";
                echo "<td>".$row['dateNaissance']."</td>";
                echo "<td>".$row['objet']."</td>";
                echo "<td><a href=updateForm.php?id=".$row['idMessage'].">update</a></td>";
                echo "<td><a href=deleteMessage.php?id=".$row['idMessage']." onClick=
\"return(confirm('Etes-vous sûr de vouloir supprimer ce message ?'));
\">delete</a></td> ";
            echo "</tr>";
        }
    }
?>
<?php
	require_once('footer.html');
?>