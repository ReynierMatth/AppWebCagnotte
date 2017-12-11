<?php
        session_start();
        $host ="localhost";
        $user ="kiwiuser";
        $password="kiwipwd";
        $database="kiwi";
        
        try{
        $connexion = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
        
        $nomcagnotte=ucwords(ucfirst($_POST['nomcagnotte']));
        $objectif=$_POST['objectif'];
        
        $pseudo =$_SESSION['Auth']['pseudo'];
      
        $res=$connexion->query("SELECT id FROM utilisateurs WHERE pseudo='$pseudo'");
        
        $res->setFetchMode(PDO::FETCH_NUM);
        while($row=$res->fetch()){
            $iduser=$row[0];
        }
        
                
        $res2=$connexion->query("SELECT MAX(id) FROM cagnotte");
        
        $res2->setFetchMode(PDO::FETCH_NUM);
        
        while($row=$res2->fetch()){
            $num=$row[0]+1;
        }
        
        
        $resultat="INSERT INTO cagnotte (id,idusers,nom,objectif) VALUES ('$num','$iduser','$nomcagnotte','$objectif')";


        $stmt=$connexion->prepare($resultat);
        $stmt->execute();
        
        $connexion = null;
        }
        catch (PDOException $exception)
            {
                echo "Connection error: ".$exception->getMessage();
            }
            
        header('Location:../php/liste.php');
?>
    
  
        
        

