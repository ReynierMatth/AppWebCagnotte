<?php
        session_start();
        $host ="localhost";
        $user ="kiwiuser";
        $password="kiwipwd";
        $database="kiwi";
        
        $idcagnotte=filter_input(INPUT_GET, "id" );
        
        try{
        $connexion = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
        
        
        $resverif=$connexion->query("SELECT idusers FROM cagnotte WHERE id='$idcagnotte'");
        $resverif->setFetchMode(PDO::FETCH_NUM);
        while($idpseudo=$resverif->fetch()){
            $resverif2=$connexion->query("SELECT pseudo FROM utilisateurs WHERE id='$idpseudo[0]'");
            $resverif2->setFetchMode(PDO::FETCH_NUM);
            while($lepseudo=$resverif2->fetch()){
                $laverif=$lepseudo[0];
            }
        
        }
        
       
        
        if($laverif==$_SESSION['Auth']['pseudo']){
                    $resultat="DELETE FROM historique WHERE idcagnotte='$idcagnotte'";
                    $resultat2="DELETE FROM cagnotte WHERE id='$idcagnotte'";


                    $stmt=$connexion->prepare($resultat);
                    $stmt->execute();

                    $stmt2=$connexion->prepare($resultat2);
                    $stmt2->execute();
        
        }
        header('Location:../php/liste.php');
        
        $connexion = null;
        }
        catch (PDOException $exception)
            {
                echo "Connection error: ".$exception->getMessage();
            }
            
        
?>