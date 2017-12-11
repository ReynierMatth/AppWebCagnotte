<?php
    session_start();
    $host ="localhost";
    $user ="kiwiuser";
    $password="kiwipwd";
    $database="kiwi";
    $i=0;
    if(isset($_POST)&&!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
    {
        extract($_POST);
        $mdp= hash('sha256',$mdp);
        try
        {
            $cnx = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
            $recid=$cnx->query("SELECT id,pseudo FROM utilisateurs");
            $recid->setFetchMode(PDO::FETCH_NUM);
            while($row=$recid->fetch()){
                 $id=$row[0]+1;
                 $pseudos=$row[1];
            
            if($pseudo==$pseudos){$i++;  }
            }
            if($i>0){
                echo '<script>var r = confirm("Ce pseudo existe déjà !");
                                if (r == true) {
                                    document.location.href="../index.php"
                    }</script>';
            }
            else{
                $res=$cnx->query("INSERT INTO utilisateurs (id,pseudo,motDePasse,nom,prenom) VALUES ('$id','$pseudo','$mdp','$nom','$prenom')");
                header('Location:../index.php');
            }
            $cnx=null;
            echo $i;
        }
            catch (PDOException $exception)
            {
                echo "Connection error: ".$exception->getMessage();
            }
        
        
    }
 