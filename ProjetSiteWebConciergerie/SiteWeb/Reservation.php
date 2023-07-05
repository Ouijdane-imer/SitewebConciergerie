
<?php
// On prolonge la session
session_start();

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['id_client'])) {

    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reservation</title>
         <link rel="stylesheet" href="style.css">

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
  <div class="TitreCompte">Réservation</div>
        
  <form action="" method="POST" class="formulaire" style="
    margin-left: 500px;
 
    margin-top: 137px;">
     
      
            <label> Date de reservation </label><br>
            <input type="date" name="dateEmprunt" placeholder=""/><br>
            <label> Date de retour </label><br>
            <input type="date" name="dateRetour" placeholder=""/><br>
            <br>
            <label style="color:red; font-family: bold;"> le jeu est conservable un mois </label><br>

          
            <input type="submit" name="valide" />  
     
                    
               
            
        </form>
        <?php
           $bdd= mysqli_connect("localhost","root","","ludotheque");
           
if(isset($_GET['id_jeu']) AND !empty($_GET['id_jeu']))
{
   
        $getid =$_GET['id_jeu'];
    $id_client=$_SESSION['id_client'];
       
           if(isset($_POST['valide']))
           {
               $DateEmprunt=$_POST['dateEmprunt'];
               $DateRetour=$_POST['dateRetour'];
          
               

             
               
            $query="INSERT INTO booking (dateEmprunt,dateRetour,id_jeu,id_client) values ('$DateEmprunt','$DateRetour','$getid',$id_client);";
          
              $sql = mysqli_query($bdd,$query) or die(mysqli_error($bdd));
               

               if($sql)
               {
                   
                   echo '<script type="text/javascript">alert("le jeu est reservé") </script> ';


                   
               }
               else{
             echo '<script type="text/javascript">alert("Data not Saved")</script> ';
             mysqli_errno($query);
               }

           }
    
  
}

           
        ?>
   <div class="footer">

            <p class="footerText"> GooProduct France</p>
        </div>
    </body>
</html>
