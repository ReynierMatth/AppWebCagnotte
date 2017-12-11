<?php
        $host ="localhost";
        $user ="kiwiuser";
        $password="kiwipwd";
        $database="kiwi";
        
        try{
        $connexion = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
        
        $pseudo =$_SESSION['Auth']['pseudo'];
      
        $res=$connexion->query("SELECT id FROM utilisateurs WHERE pseudo='$pseudo'");
        
        $res->setFetchMode(PDO::FETCH_NUM);
        while($row=$res->fetch())
        {
            $iduser=$row[0];
        }
        
                
        $res2=$connexion->query("SELECT cagnotte.nom, utilisateurs.pseudo, cagnotte.objectif, historique.montant
                                FROM cagnotte INNER JOIN historique ON cagnotte.id = historique.idcagnotte
                                AND historique.idmembres = '$iduser' 
                                INNER JOIN utilisateurs ON utilisateurs.id = cagnotte.idusers
                                ORDER BY cagnotte.id DESC");
        
        $res2->setFetchMode(PDO::FETCH_NUM);
        while($row=$res2->fetch()){
            echo '<tr>';
            echo '<td>'.$row[0].'</td>';
            echo '<td>'.$row[1].'</td>';
            echo '<td>'.$row[2].' € </td>';
            echo '<td>'.$row[3].' € </td>';
            echo '</tr>';
            }
            
        $connexion = null;
        }
        catch (PDOException $exception)
            {
                echo "Connection error: ".$exception->getMessage();
            }
