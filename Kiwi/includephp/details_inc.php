<?php

$host = "localhost";
$user = "kiwiuser";
$password = "kiwipwd";
$database = "kiwi";
$connexion = new PDO("mysql:host=" . $host . ";" . "dbname=" . $database, $user, $password);

$idcagnotte=filter_input(INPUT_GET, "id" );
$resultat = $connexion->query("SELECT cagnotte.nom, utilisateurs.pseudo, cagnotte.objectif "
        . "FROM cagnotte INNER JOIN utilisateurs ON cagnotte.idusers = utilisateurs.id "
        . "WHERE cagnotte.id='$idcagnotte' ");

$resultat->setFetchMode(PDO::FETCH_NUM);
while ($row = $resultat->fetch()) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '<td>' . $row[1] . '</td>';
                echo '<td>' . $row[2] . ' € </td>';
                echo '</tr>';
            
        }


$connexion = null;

