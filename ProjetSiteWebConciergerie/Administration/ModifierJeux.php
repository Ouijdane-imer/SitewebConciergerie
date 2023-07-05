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
         if(isset($_POST['valider']))
         {
             $titre_saisi= htmlspecialchars($_POST['NomJeu']);
               $Genre_saisi= htmlspecialchars($_POST['Genre']);
                 $nbJoueurs_saisi= htmlspecialchars($_POST['nbjoueurs']);
                   $type_saisi= htmlspecialchars($_POST['Type']);
             $description_saisie= nl2br(htmlspecialchars($_POST['Description']));
             $age_saisi=htmlspecialchars($_POST['age']);
             $updateArticle=$db->prepare('UPDATE jeux set NomJeu= ?,Genre= ?,nbjoueurs=?,Type=?,age=?,Description= ? where id_jeu= ? ');
             $updateArticle->execute(array($titre_saisi,$Genre_saisi,$nbJoueurs_saisi,$type_saisi,$age_saisi,$description_saisie,$getid));
         
               header('Location:CatalogueJeux.php');
             
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
        <title>Modifier Article</title>
        <meta charset="utf_8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav>
            <div> 
                  <h1 class="header"> O&I Ludotheque
                 </h1>  
           
              </div>  <ul>
                  <li><a class="active" href="index.php">Accueil</a></li>
                    <li><a href="NouveauxJeux.php">Saisie nouveaux jeux</a></li>
                    <li><a href="CatalogueJeux.php">Catalogue des jeux</a></li>

               
            
            </ul>  
             
        </nav>
        
         <div class="TitreCompte">Modifier des jeux</div>
        <form method="POST" action="" style="    margin-left: 500px;
    margin-top: 94px;">
            <label> Nom du jeu </label>
            <br>
         
            <input type="text" name="NomJeu" value="<?=$titre;?>">
            <br>
            <label> Age </label>
            <br>
             <input type="text" name="age" value="<?=$age;?>">
             <br>
             <label> Genre </label>
             <br>
              <input type="text" name="Genre" value="<?=$Genre;?>">
              <br>
              <label>Type (individuel ou collectif) </label>
              <br>
                <input type="text" name="Type" value="<?=$type;?>">
                <br>
                <label> Nombre des joueurs </label>
                <br>
                  <input type="text" name="nbjoueurs" value="<?=$nbJoueurs;?>">
                  <br>
                  <label> Description </label>
                  <br>
            <textarea name="Description"><?=$description;?></textarea>
            <br><br>
            <input type="submit" name="valider">
        </form>
    </body>
</html>
                
                
            
 
