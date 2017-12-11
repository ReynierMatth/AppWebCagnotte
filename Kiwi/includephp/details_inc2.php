<?php

$host = "localhost";
$user = "kiwiuser";
$password = "kiwipwd";
$database = "kiwi";
$connexion = new PDO("mysql:host=" . $host . ";" . "dbname=" . $database, $user, $password);

$idcagnotte = filter_input(INPUT_GET, "id");
$resultat = $connexion->query("SELECT utilisateurs.pseudo, historique.montant "
        . "FROM historique INNER JOIN utilisateurs ON historique.idmembres = utilisateurs.id "
        . "WHERE historique.idcagnotte='$idcagnotte' ");
$resultat->setFetchMode(PDO::FETCH_NUM);
$req2 = $connexion->query("SELECT count(*) FROM historique WHERE historique.idcagnotte='$idcagnotte' ");
$req2->setFetchMode(PDO::FETCH_NUM);


while ($row = $resultat->fetch()) {

    echo '<tr>';
    echo '<td>' . $row[0] . '</td>';
    echo '<td>' . $row[1] . ' €</td>';
    echo '</tr>';
}

$resultat2 = $connexion->query("SELECT SUM(montant) "
        . "FROM historique "
        . "WHERE historique.idcagnotte='$idcagnotte' ");

$resultat2->setFetchMode(PDO::FETCH_NUM);

$verif=0;
while ($row = $resultat2->fetch()) {
    
    while ($row2 = $req2->fetch()) {
        if ($row2[0] != 0) {
            echo '<tr>';
            echo '<td> </td>';
            echo '<td><b>Total actuel : </b>' . $row[0] . ' €</td>';
            echo '</tr>';
            $verif=1;
        }
    }
    if($verif!=1){
        echo '<tr>';
            echo '<td> </td>';
            echo '<td><b>Total actuel : </b> 0 €</td>';
            echo '</tr>';
    }
}



$connexion = null;

