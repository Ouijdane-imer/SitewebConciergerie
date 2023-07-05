<?php
 $db = new PDO("mysql:host=localhost;dbname=ludotheque","root","");
if(isset($_GET['id_jeu']) AND !empty($_GET['id_jeu']))
{
    $getid =$_GET['id_jeu'];
    $recupArticle=$db->prepare("SELECT * FROM `jeux` WHERE id_jeu=?");
    $recupArticle->execute(array($getid));
     if($recupArticle->rowCount()>0){
         $deleteArticle= $db->prepare("delete  from jeux where id_jeu= ?");
        $deleteArticle->execute(array($getid));
         header('Location:CatalogueJeux.php');
     }else{
         echo 'Aucun article trouvé';
     }
    
}else{
    echo 'Aucun identifiant trouvé';
}

?>