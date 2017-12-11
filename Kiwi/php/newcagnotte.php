<?php include('../includephp/session.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" href="../img/kiwi.ico" />
        <title>Kiwi la cagnotte de ta vie !</title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="../css/header_menu.css" rel="stylesheet" type="text/css"/>
       <link href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
       <link rel="stylesheet" href="../css/newcagnotte.css" type ="text/css"/>
       <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
       <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    </head>
    <body  style='background:url(../img/fondfruits.png); background-size: 100%;'>
        <div id="menu_header" class="navbar navbar-default " role="navigation">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand"  style="font-family:Vinegar Stroke; font-size:28px" href="../index.php">Kiwizen</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="liste.php">Liste </a>
                        </li>
                        <li><a href="newcagnotte.php">Nouvelle Cagnotte</a>
                        </li>
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon Compte
                        <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="mescagnottes.php">Mes Cagnottes</a></li>
                                <li><a href="mesparticipations.php">Mes Participations</a></li>
                                <li><a href="../includephp/logout.php">Deconnexion</a></li> 
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><span class="glyphicon glyphicon-user"></span> Bonjour 
                            <?php
                            echo strtoupper(implode("", $_SESSION['Membre']['nom']));
                            echo' ';
                            echo ucfirst(implode("", $_SESSION['Membre']['prenom']));
                            ?></a></li>
                    </ul>
                </div>


            </div>
        </div>
        
        <div class="container">
            <div class="well well-lg"> 
                 <h1>Nouvelle Cagnotte</h1>
           
                <form class="cree" method="post" role="form" action="../includephp/newcagnotte_inc.php">
                    <div class="form-group">
                        <label for="nomcagnotte">Nom cagnotte : </label>
                        <input type="nomcagnotte" class="form-control" name="nomcagnotte" placeholder="Entrer un nom"/>
                    </div>
                    <div class="form-group">
                        <label for="objectif">Objectif : </label>
                        <input type="number" class="form-control" name="objectif" min="0" placeholder="Entrer un montant"/>
                    </div>
                    <button type="submit" href="liste.php" name="submit" class="btn btn-default" >Submit</button>
                </form>
            </div>
        </div>
        <?php include('../includephp/footer.inc.php'); ?>
    </body>
    
</html>

