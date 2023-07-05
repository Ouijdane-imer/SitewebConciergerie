




<?php
$db = new PDO("mysql:host=localhost;dbname=ludotheque","root","");
if(isset($_GET['id_jeu']) AND !empty($_GET['id_jeu']))
{
    $getid =$_GET['id_jeu'];
    $recupArticle=$db->prepare("SELECT * FROM `jeux` WHERE id_jeu=?;");
    $recupArticle->execute(array($getid));
     if($recupArticle->rowCount()>0){
         $articleInfos=$recupArticle->fetch();
         $titre=$articleInfos['NomJeu'];
         $age=$articleInfos['age'];
         $Genre=$articleInfos['Genre'];
         $nbJoueurs=$articleInfos['nbjoueurs'];
         $type=$articleInfos['Type'];
         $description= str_replace('<br/>','', $articleInfos['Description']);
         $image= '<img style="    width: 215px;
    height: 174px;" src= "'.$articleInfos['images'].'" />';
         if(isset($_POST['valider']))
         {
             
         
               header('Location:login.php');
             
         }
         if(isset($_POST['Retour']))
{
    
               header('Location:BOUTIQUE.php');
}

       
       
     }else{
         echo 'Aucun article trouvé';
     }
    
}else{
    echo 'Aucun id trouvé';
}



?>


<html>
    <head>
        <title>Information sur le jeu</title>
        <meta charset="utf_8">
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
<nav>
            <div> 
                  <h1 class="header"> O&I Ludotheque
                 </h1>    
           
              </div>
          
            <ul>
                <li><a class="active" href="home.html">Accueil</a></li>
                <li><a href="BOUTIQUE.php">Jeux</a></li>
                <li><a href="contact.html">Contact</a></li>

               
                <a href="LoginEspacePerso.php""><img class="img" src="images/icons8-utilisateur-sexe-neutre-128.png" alt="monCompte.html"/></a>
                <input  class="input" type="text" placeholder="Rechercher">
            </ul>  
        </nav>
        
         <div class="TitreCompte">Informations</div>
        <form method="POST" action="" style="    margin-left: 500px;
    margin-top: 94px;">
            
            <a> <?=$image;?></a>
            <br>
            <a> <?=$titre;?></a>
            <br>
            <a>  <?=$Genre;?></a>
          
                  <br>
                  <label> Description </label>
                  <br>
                  <p><?=$description;?></p>
            <br><br>
            <button  name="valider" onclick="window.location.href='buttonReservationInformation.php'" >Reserver</button>
            <button name="Retour">Retour a la page precedente</button>
        </form>
    </body>
</html>