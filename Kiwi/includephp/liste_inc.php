<?php

$host = "localhost";
$user = "kiwiuser";
$password = "kiwipwd";
$database = "kiwi";
$connexion = new PDO("mysql:host=" . $host . ";" . "dbname=" . $database, $user, $password);
$montant;
$idcagnotte;


$resultat = $connexion->query("SELECT cagnotte.nom, utilisateurs.pseudo, cagnotte.objectif, cagnotte.id FROM cagnotte INNER JOIN utilisateurs WHERE cagnotte.idusers = utilisateurs.id ORDER BY cagnotte.id DESC");
$resultat->setFetchMode(PDO::FETCH_NUM);



while ($row = $resultat->fetch()) {
    $resmontant = $connexion->query("SELECT SUM(montant), idcagnotte FROM historique  GROUP BY idcagnotte");
    $resmontant->setFetchMode(PDO::FETCH_NUM);

    $res = $connexion->query("SELECT * FROM cagnotte WHERE id NOT IN(SELECT idcagnotte FROM historique)");
    $res->setFetchMode(PDO::FETCH_NUM);

    while ($resm = $resmontant->fetch()) {
        $montant = $resm[0];
        $idcagnotte = $resm[1];

        if (($row[3] == $idcagnotte)) {
            echo '<tr>';
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . ' € </td>';
            if ($montant < $row[2]) {
                echo '<td class="danger">' . $montant . ' € </td>';
            } else {
                echo '<td class="success">' . $montant . ' € </td>';
            }
            
            echo'<td><a href="../php/details.php?id=' . $row[3] . '" target="_blank"> <input type="button" method="post"  class="btn btn-success" value="Details"> </a><a href="../php/participer.php?id=' . $row[3] . '" target="_blank"> <input type="button" method="post"  class="btn btn-primary" value="Participer"> </a></td>';
            echo '</tr>';
        }
        while ($r = $res->fetch()) {
            if (($row[3] == $r[0]) && ($row[3] != $idcagnotte)) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '<td>' . $row[1] . '</td>';
                echo '<td>' . $row[2] . ' € </td>';
                echo '<td class="danger"> 0 € </td>';
                echo'<td><a href="../php/details.php?id=' . $row[3] . '" target="_blank"> <input type="button" method="post"  class="btn btn-success" value="Details"> </a><a href="../php/participer.php?id=' . $row[3] . '" target="_blank"> <input type="button" method="post" class="btn btn-primary" value="Participer"> </a></td>';
                echo '</tr>';
            }
        }
    }
}

$connexion = null;
