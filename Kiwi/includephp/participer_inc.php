<?php
        session_start();
        $host ="localhost";
        $user ="kiwiuser";
        $password="kiwipwd";
        $database="kiwi";
        
        $idcagnotte=$_SESSION['getid'];
        
        try{
        $connexion = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
        
        $montant=$_POST['montant']; 
        $pseudo =$_SESSION['Auth']['pseudo'];
        
        
        $res2=$connexion->query("SELECT MAX(id) FROM historique");
        
        $res2->setFetchMode(PDO::FETCH_NUM);
        while($row=$res2->fetch()){
            $num=$row[0]+1;
        }
        
        $res=$connexion->query("SELECT id FROM utilisateurs WHERE pseudo='$pseudo'");
        
        $res->setFetchMode(PDO::FETCH_NUM);
        while($row=$res->fetch())
        {
            $iduser=$row[0];
        }
        
        
        $resultat="INSERT INTO historique (id,idcagnotte,idmembres,montant) VALUES ('$num','$idcagnotte','$iduser','$montant')";


        $stmt=$connexion->prepare($resultat);
        $stmt->execute();
        

        header('Location:../php/liste.php');
        
        $connexion = null;
        }
        catch (PDOException $exception)
            {
                echo "Connection error: ".$exception->getMessage();
            }
            
        
?>