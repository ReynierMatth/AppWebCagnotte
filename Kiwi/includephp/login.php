 <?php
    session_start();
    $host ="localhost";
    $user ="kiwiuser";
    $password="kiwipwd";
    $database="kiwi";
    if(isset($_POST)&&!empty($_POST['pseudo']) && !empty($_POST['mdp']))
    {
        extract($_POST);
        $mdp= hash('sha256',$mdp);
        try
        {
            $cnx = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
            $res=$cnx->query("SELECT id FROM utilisateurs WHERE pseudo='$pseudo' AND motDePasse='$mdp'");
            $res2=$cnx->query("SELECT nom FROM utilisateurs WHERE pseudo='$pseudo' AND motDePasse='$mdp'");
            $res3=$cnx->query("SELECT prenom FROM utilisateurs WHERE pseudo='$pseudo' AND motDePasse='$mdp'");
            
            $etat=$res->rowCount();
            if($etat>0){
                $_SESSION['Auth']=array('pseudo'=>$pseudo, 'mdp'=>$mdp);
                
                $nom = $res2->fetch(PDO::FETCH_ASSOC);
                $prenom = $res3->fetch(PDO::FETCH_ASSOC);
                
                $_SESSION['Membre']=  array('nom'=> $nom, 'prenom'=>$prenom);
                header('Location:../php/liste.php');
                
            }
            else{
                echo '<script>var r = confirm("Mauvais identifiant");
                                if (r == true) {
                                    document.location.href="../index.php"
                    }</script>';

 
            }
            $cnx=null;
        }
            catch (PDOException $exception)
            {
                echo "Connection error: ".$exception->getMessage();
            }
        
        
    }
    ?>
    
  
        
        

