<?php

$host = "localhost";
$user = "kiwiuser";
$password = "kiwipwd";
$database = "kiwi";

try {
    $connexion = new PDO("mysql:host=" . $host . ";" . "dbname=" . $database, $user, $password);

    $pseudo = $_SESSION['Auth']['pseudo'];

    $res = $connexion->query("SELECT id FROM utilisateurs WHERE pseudo='$pseudo'");

    $res->setFetchMode(PDO::FETCH_NUM);
    while ($row = $res->fetch()) {
        $iduser = $row[0];
    }

    $resultat = $connexion->query("SELECT nom, objectif, id FROM cagnotte WHERE idusers = '$iduser' ORDER BY id DESC");
    $resultat->setFetchMode(PDO::FETCH_NUM);


    while ($row = $resultat->fetch()) {
        $resmontant = $connexion->query("SELECT SUM(montant), idcagnotte FROM historique  GROUP BY idcagnotte");
        $resmontant->setFetchMode(PDO::FETCH_NUM);

        $res = $connexion->query("SELECT * FROM cagnotte WHERE id NOT IN(SELECT idcagnotte FROM historique)");
        $res->setFetchMode(PDO::FETCH_NUM);

        while ($resm = $resmontant->fetch()) {
            $montant = $resm[0];
            $idcagnotte = $resm[1];

            if (($row[2] == $idcagnotte)) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '<td>' . $row[1] . ' € </td>';
                if ($montant < $row[1]) {
                    echo '<td class="danger">' . $montant . ' € </td>';
                } else {
                    echo '<td class="success">' . $montant . ' € </td>';
                }
                echo'<td><a href="../php/details.php?id=' . $row[2] . '" target="_blank"> <input type="button" method="post"  class="btn btn-success" value="Details"> </a><a href="../includephp/delete_inc.php?id=' . $row[2] . '" target="_blank"> <input type="button" method="post"  class="btn btn-danger" value="Delete"> </a></td>';
                echo '</tr>';
            }
            while ($r = $res->fetch()) {
                if (($row[2] == $r[0]) && ($row[2] != $idcagnotte)) {
                    echo '<tr>';
                    echo '<td>' . $row[0] . '</td>';
                    echo '<td>' . $row[1] . ' € </td>';
                    echo '<td class="danger"> 0 € </td>';
                    echo'<td><a href="../php/details.php?id=' . $row[2] . '" target="_blank"> <input type="button" method="post"  class="btn btn-success" value="Details"> </a><a href="../includephp/delete_inc.php?id=' . $row[2] . '" target="_blank"> <input type="button" method="post" class="btn btn-danger" value="Delete"> </a></td>';
                    echo '</tr>';
                }
            }
        }
    }
    $connexion = null;
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
           

    
