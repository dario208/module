<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

         //connexion à la base de donnée
          include_once "connexion.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($con , "SELECT * FROM module WHERE id = $id");


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           if(isset($titre) && isset($professeur) && isset($numéro) && isset($description)){
               //requête de modification
               $query = "UPDATE module SET `titre` = '$titre' ,`numéro`='$numéro',`professeur`='$professeur',`description`='$description' WHERE module_id = $id" ;
               $req = mysqli_query($con, $query);
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "Employé non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier l'employé :</h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>titre</label>
            <input type="text" name="titre">
            <label>professeur</label>
            <input type="text" name="professeur">
            <label>description</label>
            <textarea name="description" id="w3review" cols="50" rows="4"></textarea>
            <label>numéro</label>
            <input type="number" name="numéro">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>