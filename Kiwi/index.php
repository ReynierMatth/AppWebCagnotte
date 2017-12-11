<?php include('./includephp/nosession.php'); ?>


<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" href="img/kiwi.ico" />
        <title>Kiwi la cagnotte de ta vie !</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/header_menu.css" rel="stylesheet" type="text/css"/>
  <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="css/accueil.css" rel="stylesheet" type="text/css"/>
  <link rel="icon" href="http://example.com/favicon.png">
  <link href="css/footer.css" rel="stylesheet" type="text/css"/>
    </head>
    <body  style='background:url(img/fondfruits.png); background-size: 100%;'>
        <div id="menu_header" class="navbar navbar-default " role="navigation">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand"  style="font-family:Vinegar Stroke; font-size:28px" href="index.php">Kiwizen</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-left">
                        
                    </ul>
                </div>
            </div>
        </div>
        
        <h1><img class="kiwigirl" src="img/kiwigrl.png" alt=""/>    Bienvenue sur Kiwizen !! <img class="kiwigirl" src="img/kiwigrl2.png" alt=""/></h1>
        <div class="container">
           
            <fieldset class="gauche">
            <div class="well well-lg"> 
                
                <h2>Inscription</h2>
                <form method="post" role="form" action="includephp/inscription.php">
                    <div class="form-group">
                        <label for="pseudo">Pseudo :</label>
                        <input type="pseudo" class="form-control" name="pseudo" placeholder="Entrer un pseudo"/>
                    </div>
                    <div class="form-group">
                        <label for="nom">Ton nom :</label>
                        <input type="nom" class="form-control" name="nom" placeholder="Entrer votre nom"/>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Ton prénom :</label>
                        <input type="prenom" class="form-control" name="prenom" placeholder="Entrer votre prenom"/>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe :</label>
                        <input type="password" class="form-control" min="4" name="mdp" placeholder="Entrer un mdp"/>
                    </div>
                    
                    <button name="submit" type="submit" class="btn btn-default">Submit</button>

                    

                </form>
            </div>    
            </fieldset>
            
            <fieldset class="droite">
            <div class="well well-lg">
                
                <h2>Connexion</h2>
                <form method="post" role="form" action="includephp/login.php">
                    <div class="form-group">
                        <label for="pseudo">Pseudo :</label>
                        <input type="pseudo" class="form-control" name="pseudo" placeholder="Entrer un pseudo"/>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe :</label>
                        <input type="password" class="form-control" min="4"  name="mdp" placeholder="Entrer un mdp"/>
                    </div>
                    
                    <button name="submit" type="submit" class="btn btn-default" >Submit</button>

                </form>
                
            </div>
            </fieldset>
        </div>
        <?php include('includephp/footer.inc.php'); ?>
    </body>
</html>

