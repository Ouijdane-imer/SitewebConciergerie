


<?php
// On prolonge la session
session_start();

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['id_client'])) {

    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: loginEspacePerso.php');
    exit();
}
?>




<?php
 $db = new PDO("mysql:host=localhost;dbname=ludotheque","root","");
if(isset($_GET['id_client']) AND !empty($_GET['id_client']))
{
    $getid =$_GET['id_client'];
    $recupArticle=$db->prepare("SELECT * FROM `booking` WHERE id_client=?;");
    $recupArticle->execute(array($getid));
     if($recupArticle->rowCount()>0){
         $articleInfos=$recupArticle->fetch();
         $DateRetour=$articleInfos['dateRetour'];
         $DateEmprunt=$articleInfos['dateEmprunt'];
       
         if(isset($_POST['valider']))
         {
             $DateEmprunt_saisi= htmlspecialchars($_POST['dateEmprunt']);
               $DateRetour_saisi= htmlspecialchars($_POST['dateRetour']);
               
             $updateArticle=$db->prepare('UPDATE booking set datEmprunt,dateRetour where id_client= ? ');
             $updateArticle->execute(array($DateEmprunt_saisi,$DateRetour_saisi,$getid));
         
               header('Location:monCompte.html');
             
         }
         
       
       
     }else{
         echo 'Aucun article trouvé';
     }
    
}else{
    echo 'Aucun identifiant trouvé';
}



?>


<html>
    <head>
        <title>Gerer la date de reservation</title>
        <meta charset="utf_8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <nav>
            <div> 
                  <h1 class="header"> GooProduct
                 </h1>  
           
              </div>
          
            <ul>
                <li><a class="active" href="home.html">Accueil</a></li>
                <li><a href="">Mon compte</a></li> 
                <a href="LoginEspacePerso.php"><img class="img" src="images/icons8-utilisateur-sexe-neutre-128.png" alt="monCompte.html"/></a>
                <input class="input" type="text" placeholder="Rechercher">
            </ul>  
        </nav>
        
         <div class="TitreCompte">Modifier la date de reservation</div>
        <form method="POST" action="" style="    margin-left: 500px;
    margin-top: 94px;">
           
            <label> DateEmprunt</label>
            <br>
             <input type="text" name="age" value="<?=$DateEmprunt;?>">
             <br>
             <label> DateDeRetour </label>
             <br>
              <input type="text" name="Genre" value="<?=$DateRetour;?>">
            
            <input type="submit" name="valider">
        </form>
    </body>
</html>
                
                
            
 
